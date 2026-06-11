<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->directory('portfolio')
                    ->required(),
                TextInput::make('name.en')
                    ->label('Name (English)')
                    ->required(),
                TextInput::make('name.ar')
                    ->label('Name (Arabic)')
                    ->required(),
                TextInput::make('badge.en')
                    ->label('Badge (English)')
                    ->placeholder('Platform'),
                TextInput::make('badge.ar')
                    ->label('Badge (Arabic)')
                    ->placeholder('منصة'),
                Textarea::make('description.en')
                    ->label('Description (English)')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description.ar')
                    ->label('Description (Arabic)')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('link')
                    ->url()
                    ->placeholder('https://...'),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
