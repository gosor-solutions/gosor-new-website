<?php

namespace App\Filament\Resources\Platforms\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class PlatformForm
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
                Textarea::make('description.en')
                    ->label('Description (English)')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description.ar')
                    ->label('Description (Arabic)')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('features.en')
                    ->label('Features (English)')
                    ->schema([
                        TextInput::make('feature')
                            ->required()
                            ->label('Bullet Point'),
                    ])
                    ->maxItems(4)
                    ->columnSpanFull(),
                Repeater::make('features.ar')
                    ->label('Features (Arabic)')
                    ->schema([
                        TextInput::make('feature')
                            ->required()
                            ->label('Bullet Point'),
                    ])
                    ->maxItems(4)
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
