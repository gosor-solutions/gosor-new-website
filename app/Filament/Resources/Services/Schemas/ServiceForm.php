<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('name.en')
                    ->label('Name (English)')
                    ->required(),
                Textarea::make('name.ar')
                    ->label('Name (Arabic)')
                    ->required(),
                Textarea::make('description.en')
                    ->label('Description (English)')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description.ar')
                    ->label('Description (Arabic)')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
