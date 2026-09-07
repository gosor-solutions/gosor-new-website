<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name.en')
                    ->label('Name (English)')
                    ->required(),
                TextInput::make('name.ar')
                    ->label('Name (Arabic)')
                    ->required(),
                TextInput::make('job_position.en')
                    ->label('Job Position (English)')
                    ->required(),
                TextInput::make('job_position.ar')
                    ->label('Job Position (Arabic)')
                    ->required(),
                Textarea::make('content.en')
                    ->label('Content (English)')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('content.ar')
                    ->label('Content (Arabic)')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
