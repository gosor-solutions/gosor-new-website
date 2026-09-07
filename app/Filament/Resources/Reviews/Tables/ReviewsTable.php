<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name.en')
                    ->state(fn ($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->searchable(),
                TextColumn::make('name.ar')
                    ->state(fn ($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->searchable(),
                TextColumn::make('job_position.en')
                    ->state(fn ($record) => $record->getTranslation('job_position', 'en', false))
                    ->label('Job Position (EN)')
                    ->searchable(),
                TextColumn::make('job_position.ar')
                    ->state(fn ($record) => $record->getTranslation('job_position', 'ar', false))
                    ->label('Job Position (AR)')
                    ->searchable(),
                TextColumn::make('content.en')
                    ->state(fn ($record) => $record->getTranslation('content', 'en', false))
                    ->label('Content (EN)')
                    ->limit(50),
                TextColumn::make('content.ar')
                    ->state(fn ($record) => $record->getTranslation('content', 'ar', false))
                    ->label('Content (AR)')
                    ->limit(50)
                    ->tooltip('Full content'),
                IconColumn::make('is_active')
                    ->boolean(),
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
