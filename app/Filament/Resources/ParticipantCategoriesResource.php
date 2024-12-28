<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantCategoriesResource\Pages;
use App\Filament\Resources\ParticipantCategoriesResource\RelationManagers;
use App\Models\Categories;
use App\Models\Classes;
use App\Models\Events;
use App\Models\participant_categories;
use App\Models\ParticipantCategories;
use App\Models\Participants;
use App\Models\Registrations;
use App\Tables\Exports\CustomTableExports;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction as TablesExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class ParticipantCategoriesResource extends Resource
{
    protected static ?string $model = participant_categories::class;

    protected static ?string $navigationLabel = 'Daftar Peserta';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function getModelLabel(): string
    {
        return 'Daftar Peserta';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Daftar Peserta';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('participant_name')
                    ->label('Nama Peserta')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->participant_name ?? 'N/A'),
                Forms\Components\TextInput::make('date_of_birth')
                    ->label('Tanggal Lahir')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->date_of_birth ? (new \DateTime($record->participantRegistration?->participantId?->date_of_birth))->format('d F Y') : 'N/A'),

                Forms\Components\TextInput::make('address')
                    ->label('Alamat')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->address ?? 'N/A'),

                Forms\Components\TextInput::make('province')
                    ->label('Provinsi')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->province ?? 'N/A'),

                Forms\Components\TextInput::make('city')
                    ->label('Kota')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->city ?? 'N/A'),

                Forms\Components\TextInput::make('district')
                    ->label('Kecamatan')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->district ?? 'N/A'),

                Forms\Components\TextInput::make('school')
                    ->label('Team')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->school ?? 'N/A'),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->email ?? 'N/A'),
                Forms\Components\TextInput::make('no_registration')
                    ->label('No Registrasi')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->registrationId?->no_registration ?? 'N/A'),

                Forms\Components\TextInput::make('class_name')
                    ->label('Kelas')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->categoryEvent?->categoryClass?->classes?->class_name ?? 'N/A'),

                Forms\Components\TextInput::make('category_name')
                    ->label('Kategori')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->categoryEvent?->categoryClass?->category?->category_name ?? 'N/A'),

                Forms\Components\TextInput::make('no_renang')
                    ->label('No Renang')
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('last_record')
                    ->label('Rekor Terakhir')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->last_record ? $record->last_record . ' Detik' : 'N/A'),

                Forms\Components\TextInput::make('created_at')
                    ->label('Waktu Pendaftaran')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->created_at ? $record->created_at->format('d/m/Y H:i:s') : 'N/A'),

                Forms\Components\TextInput::make('status')
                    ->label('Status Bayar')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->registrationId?->status ?? 'N/A')
                    ->suffix(fn($record) => match ($record->participantRegistration?->registrationId?->status) {
                        'Pending' => '⏳',
                        'Success' => '✅',
                        default => '❔',
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('participantRegistration.participantId.participant_name')
                    ->label('Nama Peserta')
                    ->searchable()


                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.date_of_birth')
                    ->label('Tanggal Lahir')
                    ->searchable()
                    ->date('d F Y')

                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.province')
                    ->label('Provinsi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.city')
                    ->label('Kota')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.district')
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.school')
                    ->label('Team')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.participantId.email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('participantRegistration.registrationId.no_registration')
                    ->label('No Registrasi')
                    ->searchable()


                    ->sortable(),
                Tables\Columns\TextColumn::make('classId.class_name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categories.category_name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_renang')
                    ->label('No Renang')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_record')
                    ->label('Rekor Terakhir')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return "$state Detik";
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Pendaftaran')
                    ->date('d/m/Y H:i:s')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.registrationId.status')
                    ->label('Status Bayar')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Success' => 'success',
                    })
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('participantRegistration.participantId.participant_name')
                    ->relationship('participantRegistration.participantId', 'participant_name')
                    ->label('Nama Peserta')
                    ->preload()
                    ->searchable()
                    ->options(Participants::all()->pluck('participant_name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('classId.class_name')
                    ->relationship('classId', 'class_name')
                    ->label('Kelas')
                    ->searchable()
                    ->preload()
                    ->options(Classes::all()->pluck('class_name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('categories.category_name')
                    ->relationship('categories', 'category_name')
                    ->label('Kategori')
                    ->searchable()
                    ->preload()
                    ->options(Categories::all()->pluck('category_name', 'id')->toArray()),

                SelectFilter::make('status')
                    ->label('Status Bayar')
                    ->options([
                        'Pending' => 'Pending',
                        'Success' => 'Success',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->whereHas('participantRegistration.registrationId', function (Builder $subQuery) use ($data) {
                                $subQuery->where('status', $data['value']);
                            });
                        }
                    }),
            ])
            ->headerActions([
                TablesExportAction::make()
                    ->color('success')
                    ->label("Export Excel")

                    ->exports([
                        ExcelExport::make('table')
                            ->fromTable()
                            ->withFilename("daftar_peserta_" . date('Y-m-d')),
                    ]),
            ])
            ->actions([

                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParticipantCategories::route('/'),
            'create' => Pages\CreateParticipantCategories::route('/create'),
            // 'edit' => Pages\EditParticipantCategories::route('/{record}/edit'),
        ];
    }
}
