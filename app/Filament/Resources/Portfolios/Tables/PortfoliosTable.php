<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->disk('public'),
                TextColumn::make('name.en')
                    ->state(fn ($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->searchable(),
                TextColumn::make('name.ar')
                    ->state(fn ($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->searchable(),
                TextColumn::make('description.en')
                    ->state(fn ($record) => $record->getTranslation('description', 'en', false))
                    ->label('Description (EN)')
                    ->limit(50),
                TextColumn::make('description.ar')
                    ->state(fn ($record) => $record->getTranslation('description', 'ar', false))
                    ->label('Description (AR)')
                    ->limit(50)
                    ->tooltip('Full description'),
                TextColumn::make('badge.en')
                    ->state(fn ($record) => $record->getTranslation('badge', 'en', false))
                    ->label('Badge (EN)')
                    ->searchable(),
                TextColumn::make('badge.ar')
                    ->state(fn ($record) => $record->getTranslation('badge', 'ar', false))
                    ->label('Badge (AR)')
                    ->searchable(),
                TextColumn::make('link')
                    ->searchable(),
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
