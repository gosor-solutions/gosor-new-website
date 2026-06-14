<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PartnerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')->disk('public'),
                TextEntry::make('name.en')
                    ->state(fn($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->columnSpanFull(),
                TextEntry::make('name.ar')
                    ->state(fn($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->columnSpanFull(),
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
