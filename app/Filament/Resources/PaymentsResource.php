<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Payments;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaymentsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentsResource\RelationManagers;

class PaymentsResource extends Resource
{
    protected static ?string $model = Payments::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Payments::query()
                    ->with([
                        'registration.user',
                        'registration.participantRegistrations.participantCategories',
                        'registration.participantRegistrations.participantCategories.classId',
                        'registration.participantRegistrations.participantCategories.categoryId',
                    ])
                    ->whereHas('registration', function ($query) {
                        $query->where('status', 'Success');
                    })
            )
            ->columns([
                TextColumn::make('registration.user.name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('registration.participantRegistrations.participantCategories.classId.class_name')
                    ->label('Kelas')
                    ->searchable()->listWithLineBreaks()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('registration.participantRegistrations.participantCategories.categoryId.category_name')
                    ->label('Nomor Renang')
                    ->searchable()->listWithLineBreaks()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('registration.type')
                    ->label('Type')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('registration.no_registration')
                    ->label('Nomor Registrasi')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('grand_total')
                    ->label('Total Transaksi')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                // SelectFilter::make('registration.type')
                //     ->options([
                //         'Mandiri' => 'Mandiri',
                //         'Kelompok' => 'Kelompok',
                //     ])
                //     ->label('Type'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayments::route('/create'),
            'edit' => Pages\EditPayments::route('/{record}/edit'),
        ];
    }
}
