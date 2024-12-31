<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantCategoriesResource\Pages;
use App\Filament\Resources\ParticipantCategoriesResource\RelationManagers;
use App\Models\Categories;
use App\Models\Classes;
use App\Models\District;
use App\Models\Events;
use App\Models\participant_categories;
use App\Models\ParticipantCategories;
use App\Models\Participants;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Registrations;
use App\Tables\Exports\CustomTableExports;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Hamcrest\Collection\IsEmptyTraversable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction as TablesExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Columns\Column;
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
                Forms\Components\Section::make('Informasi Peserta')
                    ->relationship('participantRegistration')
                    ->schema([
                        Forms\Components\Group::make()
                            ->relationship('participantId')
                            ->schema([
                                Forms\Components\TextInput::make('participant_name')
                                    ->required()
                                    ->label('Nama Peserta'),
                                Forms\Components\DatePicker::make('date_of_birth')
                                    ->label('Tanggal Lahir')
                                    ->required(),
                                Forms\Components\TextInput::make('address')
                                    ->required()
                                    ->label('Alamat'),
                                Forms\Components\Select::make('province')
                                    ->label('Provinsi')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->options(Province::all()->pluck('name', 'name')->toArray()),
                                Forms\Components\Select::make('city')
                                    ->label('Kota')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->options(Regency::all()->pluck('name', 'name')->toArray()),
                                Forms\Components\Select::make('district')
                                    ->label('Kecamatan')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->options(District::all()->pluck('name', 'name')->toArray()),
                                Forms\Components\TextInput::make('school')
                                    ->required()
                                    ->label('Tim (Sekolah/Club/Private/Ekskul)'),
                                Forms\Components\TextInput::make('email')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->label('Email'),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->relationship('registrationId')
                            ->schema([
                                Forms\Components\TextInput::make('no_registration')
                                    ->label('No Registrasi')
                                    ->readOnly()
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label('Status Bayar')
                                    ->required()
                                    ->options([
                                        'Pending' => 'Pending',
                                        'Success' => 'Success',
                                        'Draft' => 'Draft',
                                    ])
                                    ->suffix(fn($record) => match ($record->status) {
                                        'Pending' => '⏳',
                                        'Success' => '✅',
                                        'Draft' => '📝',
                                        default => '❔',
                                    }),
                            ])->columns(2)
                    ]),
                Forms\Components\Section::make('Data Pendaftaran')
                    ->schema([
                        Forms\Components\Repeater::make('classParticipant')
                            ->label("Kelas")
                            ->relationship('classParticipant')
                            ->schema([
                                Forms\Components\Select::make('class_name')
                                    ->hiddenLabel()
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->options(Classes::all()->pluck('class_name', 'class_name')->toArray())
                            ])
                            ->addable(false)
                            ->required()
                            ->deletable(false)
                            ->columns(1),

                        Forms\Components\Repeater::make('categories')
                            ->label('Kategori')
                            ->required()
                            ->relationship('categories')
                            ->schema([
                                Forms\Components\Select::make('category_name')
                                    ->label('Kategori')
                                    ->required()
                                    ->hiddenLabel()
                                    ->searchable()
                                    ->preload()
                                    ->options(Categories::all()->pluck('category_name', 'category_name')->toArray())
                            ])
                            ->addable(false)
                            ->deletable(false),
                        Forms\Components\TextInput::make('no_renang')
                            ->label('No Renang')
                            ->required(),
                        Forms\Components\TextInput::make('last_record')
                            ->label('Rekor Terakhir'),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->required(),
                    ])->columns(2),
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
                    ->label('Tim (Sekolah/Club/Private/Ekskul)')
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
                        return $state ?? '-';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Pendaftaran')
                    ->date('d/m/Y H:i:s')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return 'Rp. ' . number_format($state, 0, ',', '.');
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.registrationId.status')
                    ->label('Status Bayar')
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Success' => 'success',
                        'Draft' => 'secondary',
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
                Tables\Filters\SelectFilter::make('participantRegistration.participantId.province')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->whereHas('participantRegistration.participantId', function (Builder $subQuery) use ($data) {
                                $subQuery->where('province', $data['value']);
                            });
                        }
                    })
                    ->label('Provinsi')
                    ->searchable()
                    ->preload()
                    ->options(Province::all()->pluck('name', 'name')->toArray()),
                Tables\Filters\SelectFilter::make('participantRegistration.participantId.city')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->whereHas('participantRegistration.participantId', function (Builder $subQuery) use ($data) {
                                $subQuery->where('city', $data['value']);
                            });
                        }
                    })
                    ->label('Kota')
                    ->searchable()
                    ->preload()
                    ->options(Regency::all()->pluck('name', 'name')->toArray()),
                Tables\Filters\SelectFilter::make('participantRegistration.participantId.district')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->whereHas('participantRegistration.participantId', function (Builder $subQuery) use ($data) {
                                $subQuery->where('district', $data['value']);
                            });
                        }
                    })
                    ->label('Kecamatan')
                    ->searchable()
                    ->preload()
                    ->options(District::all()->pluck('name', 'name')->toArray()),
            ])
            ->headerActions([
                TablesExportAction::make()
                    ->color('success')
                    ->label("Export Excel")

                    ->exports([
                        ExcelExport::make()

                            ->fromTable()->ignoreFormatting([
                                'price',
                                'created_at'
                            ])

                            ->withFilename("daftar_peserta_" . date('Y-m-d')),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([

                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'edit' => Pages\EditParticipantCategories::route('/{record}/edit'),
        ];
    }
}
