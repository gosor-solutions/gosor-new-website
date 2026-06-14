<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Long Text',
                        'image' => 'Image',
                        'url' => 'URL',
                        'email' => 'Email',
                        'tel' => 'Phone',
                    ])
                    ->required()
                    ->live(),
                
                TextInput::make('text_value')
                    ->label('Value')
                    ->visible(fn (Get $get) => in_array($get('type'), ['text', 'url', 'email', 'tel']))
                    ->required(),
                
                Textarea::make('textarea_value')
                    ->label('Value')
                    ->visible(fn (Get $get) => $get('type') === 'textarea')
                    ->required(),

                FileUpload::make('image_value')
                    ->label('Value')
                    ->image()
                    ->disk('public')
                    ->directory('settings')
                    ->visible(fn (Get $get) => $get('type') === 'image')
                    ->required(),
            ]);
    }
}
