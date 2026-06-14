<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PortfolioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image')->disk('public'),
                TextEntry::make('name.en')
                    ->state(fn($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->columnSpanFull(),
                TextEntry::make('name.ar')
                    ->state(fn($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->columnSpanFull(),
                TextEntry::make('description.en')
                    ->state(fn($record) => $record->getTranslation('description', 'en', false))
                    ->label('Description (EN)')
                    ->columnSpanFull(),
                TextEntry::make('description.ar')
                    ->state(fn($record) => $record->getTranslation('description', 'ar', false))
                    ->label('Description (AR)')
                    ->columnSpanFull(),
                TextEntry::make('link')
                    ->placeholder('-'),
                TextEntry::make('badge.en')
                    ->state(fn($record) => $record->getTranslation('badge', 'en', false))
                    ->label('Badge (EN)')
                    ->placeholder('-'),
                TextEntry::make('badge.ar')
                    ->state(fn($record) => $record->getTranslation('badge', 'ar', false))
                    ->label('Badge (AR)')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
