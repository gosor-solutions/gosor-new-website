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
                TextInput::make('name')
                    ->required(),
                TextInput::make('badge')
                    ->label('Badge Text (e.g. Platform, Web)')
                    ->placeholder('Platform'),
                Textarea::make('description')
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
