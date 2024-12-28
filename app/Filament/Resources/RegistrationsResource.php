<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationsResource\Pages;
use App\Filament\Resources\RegistrationsResource\RelationManagers;
use App\Models\Events;
use App\Models\Payments;
use App\Models\Registrations;
use App\Models\User;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrationsResource extends Resource
{
    protected static ?string $model = Registrations::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';
    protected static ?string $navigationLabel = 'Registrasi';


    public static function getModelLabel(): string
    {
        return 'Registrasi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Registrasi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Registrasi')->schema([
                    Forms\Components\TextInput::make('no_registration')
                        ->label("Nomor Registrasi")
                        ->required()
                        ->maxLength(10),
                    Forms\Components\TextInput::make('subtotal')
                        ->label("Sub Total")
                        ->readOnly()
                        ->formatStateUsing(function ($state, ?Registrations $record) {
                            return 'Rp. ' . number_format($record?->payments->sub_total ?? 0, 0, ',', '.');
                        }),
                    Forms\Components\Select::make('user_id')
                        ->required()
                        ->label("Registrasi Oleh")
                        ->searchable()
                        ->options(
                            User::all()->pluck('name', 'id')->toArray()
                        ),
                    Forms\Components\TextInput::make('fee')
                        ->label("Biaya Admin")
                        ->readOnly()
                        ->formatStateUsing(function ($state, ?Registrations $record) {
                            return 'Rp. ' . number_format($record?->payments->fee ?? 0, 0, ',', '.');
                        }),

                    Forms\Components\Select::make('type')
                        ->label("Jenis Registrasi")
                        ->required()
                        ->options([
                            'Mandiri' => 'Mandiri',
                            'Kelompok' => 'Kelompok',
                        ]),
                    Forms\Components\TextInput::make('grandTotal')
                        ->label("Total Biaya")
                        ->readOnly()
                        ->formatStateUsing(function ($state, ?Registrations $record) {
                            return 'Rp. ' . number_format($record?->payments->grand_total ?? 0, 0, ',', '.');
                        }),
                    Forms\Components\TextInput::make('totalPeserta')
                        ->label("Total Peserta")
                        ->readOnly()
                        ->formatStateUsing(function (?int $state, ?Registrations $record) {
                            return $record ? count($record->participantRegistrations) : 0;
                        }),
                    Forms\Components\TextInput::make('status')
                        ->label("Status Pembayaran")
                        ->required()
                        ->maxLength(25),
                    Forms\Components\TextInput::make('totalNomorRenang')
                        ->label("Total Nomor Renang")
                        ->readOnly()
                        ->formatStateUsing(function (?int $state, ?Registrations $record) {
                            if ($record === null || $record->participantRegistrations === null) {
                                return 0;
                            }

                            $totalNomorRenang = 0;

                            foreach ($record->participantRegistrations as $participantRegistration) {
                                $participantCategories = $participantRegistration->participantCategories;
                                if ($participantCategories !== null) {
                                    $totalNomorRenang += $participantCategories->count();
                                }
                            }

                            return $totalNomorRenang;
                        }),
                    Forms\Components\Select::make('event_id')
                        ->required()
                        ->label("Nama Event")
                        ->searchable()
                        ->options(
                            Events::all()->pluck('event_name', 'id')->toArray()
                        ),
                ])->columns(2),
                Forms\Components\Repeater::make('participantRegistrations')
                    ->relationship('participantRegistrations') // Establish the relationship
                    ->label('Peserta dan Kategori Renang')
                    ->schema([
                        Forms\Components\Section::make('Peserta dan Kategori Renang')->columns(2)->schema([
                            Forms\Components\TextInput::make('participant_name')
                                ->label('Nama Peserta')
                                ->readOnly()
                                ->formatStateUsing(fn($state, $record) => $record?->participantId?->participant_name ?? ''),
                            Forms\Components\Repeater::make('participantCategories')
                                ->relationship('participantCategories')
                                ->schema([
                                    Forms\Components\TextInput::make('category_name')
                                        ->label('Nama Kategori')
                                        ->readOnly()
                                        ->formatStateUsing(fn($state, $record) => $record?->categories?->first()?->category_name ?? ''),
                                ])
                                ->label('Kategori Renang')
                                ->columns(1)
                                ->disableItemCreation()
                                ->disableItemDeletion(),
                        ]),
                    ])
                    ->columnSpanFull()
                    ->disableItemCreation()
                    ->disableItemDeletion()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('eventIds.event_name')
                    ->numeric()
                    ->searchable()
                    ->label("Nama Event")
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_registration')
                    ->searchable()
                    ->label("Nomor Registrasi"),
                Tables\Columns\TextColumn::make('type')
                    ->icon(fn($record) => $record->type === 'Mandiri' ? 'heroicon-o-user' : ($record->type === 'Kelompok' ? 'heroicon-o-users' : null))
                    ->iconColor('primary')
                    ->label("Tipe Registrasi")
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label("Status Registrasi")
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Success' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'Mandiri' => 'Mandiri',
                        'Kelompok' => 'Kelompok',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Success' => 'Success',
                        'Pending' => 'Pending',
                    ]),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistrations::route('/create'),
            // 'edit' => Pages\EditRegistrations::route('/{record}/edit'),
        ];
    }
}
