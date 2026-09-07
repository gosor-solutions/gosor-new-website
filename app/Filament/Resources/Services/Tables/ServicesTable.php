<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name.en')
                    ->state(fn ($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name.ar')
                    ->state(fn ($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description.en')
                    ->state(fn ($record) => $record->getTranslation('description', 'en', false))
                    ->label('Description (EN)')
                    ->limit(50),
                TextColumn::make('description.ar')
                    ->state(fn ($record) => $record->getTranslation('description', 'ar', false))
                    ->label('Description (AR)')
                    ->limit(50),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
