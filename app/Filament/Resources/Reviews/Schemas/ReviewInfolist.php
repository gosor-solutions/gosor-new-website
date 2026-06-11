<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReviewInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name.en')
                    ->state(fn($record) => $record->getTranslation('name', 'en', false))
                    ->label('Name (EN)')
                    ->columnSpanFull(),
                TextEntry::make('name.ar')
                    ->state(fn($record) => $record->getTranslation('name', 'ar', false))
                    ->label('Name (AR)')
                    ->columnSpanFull(),
                TextEntry::make('job_position.en')
                    ->state(fn($record) => $record->getTranslation('job_position', 'en', false))
                    ->label('Job Position (EN)')
                    ->columnSpanFull(),
                TextEntry::make('job_position.ar')
                    ->state(fn($record) => $record->getTranslation('job_position', 'ar', false))
                    ->label('Job Position (AR)')
                    ->columnSpanFull(),
                TextEntry::make('content.en')
                    ->state(fn($record) => $record->getTranslation('content', 'en', false))
                    ->label('Content (EN)')
                    ->columnSpanFull(),
                TextEntry::make('content.ar')
                    ->state(fn($record) => $record->getTranslation('content', 'ar', false))
                    ->label('Content (AR)')
                    ->columnSpanFull(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
