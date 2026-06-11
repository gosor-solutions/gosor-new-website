<?php

namespace App\Filament\Resources\Platforms\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Schemas\Schema;

class PlatformInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->columnSpanFull(),
                RepeatableEntry::make('features')
                    ->schema([
                        TextEntry::make('feature')
                            ->hiddenLabel(),
                    ])
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
