<?php

namespace App\Filament\Resources\Platforms\Pages;

use App\Filament\Resources\Platforms\PlatformResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlatform extends CreateRecord
{
    protected static string $resource = PlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
