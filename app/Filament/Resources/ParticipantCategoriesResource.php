<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantCategoriesResource\Pages;
use App\Filament\Resources\ParticipantCategoriesResource\RelationManagers;
use App\Models\Classes;
use App\Models\Events;
use App\Models\participant_categories;
use App\Models\ParticipantCategories;
use App\Models\Participants;
use App\Models\Registrations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParticipantCategoriesResource extends Resource
{
    protected static ?string $model = participant_categories::class;

    protected static ?string $navigationLabel = 'Kategori Peserta';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function getModelLabel(): string
    {
        return 'Kategori Peserta';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kategori Peserta';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('participant_name')
                    ->label('Nama Peserta')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->participantId?->participant_name ?? 'N/A'),

                Forms\Components\TextInput::make('no_registration')
                    ->label('No Registrasi')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->participantRegistration?->registrationId?->no_registration ?? 'N/A'),

                Forms\Components\TextInput::make('class_name')
                    ->label('Kelas')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->categoryEvent?->categoryClass?->classes?->class_name ?? 'N/A'),

                Forms\Components\TextInput::make('event_name')
                    ->label('Kategori')
                    ->disabled()
                    ->formatStateUsing(fn($record) => $record->categoryEvent?->eventId?->event_name ?? 'N/A'),

                Forms\Components\TextInput::make('no_renang')
                    ->label('No Renang')
                    ->required(),

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
                    ->numeric()

                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.registrationId.no_registration')
                    ->label('No Registrasi')
                    ->searchable()
                    ->numeric()

                    ->sortable(),
                Tables\Columns\TextColumn::make('categoryEvent.categoryClass.classes.class_name')
                    ->label('Kelas')
                    ->searchable()
                    ->numeric()

                    ->sortable(),
                Tables\Columns\TextColumn::make('categoryEvent.eventId.event_name')
                    ->label('Kategori')
                    ->searchable()
                    ->numeric()

                    ->sortable(),
                Tables\Columns\TextColumn::make('no_renang')
                    ->label('No Renang')
                    ->searchable()
                    ->numeric()

                    ->sortable(),
                Tables\Columns\TextColumn::make('participantRegistration.registrationId.status')
                    ->label('Status Bayar')
                    ->searchable()
                    ->numeric()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Success' => 'success',
                    })
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('participantRegistration.participantId.participant_name')
                    ->label('Nama Peserta')
                    ->searchable()
                    ->options(Participants::all()->pluck('participant_name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('categoryEvent.categoryClass.classes.class_name')
                    ->label('Kelas')
                    ->options(Classes::all()->pluck('class_name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('categoryEvent.eventId.event_name')
                    ->label('Kategori')
                    ->options(Events::all()->pluck('event_name', 'id')->toArray()),


                Tables\Filters\SelectFilter::make('participantRegistration.registrationId.status')
                    ->label('Status Bayar')
                    ->options([
                        'Pending' => 'Pending',
                        'Success' => 'Success',
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
            'edit' => Pages\EditParticipantCategories::route('/{record}/edit'),
        ];
    }
}
