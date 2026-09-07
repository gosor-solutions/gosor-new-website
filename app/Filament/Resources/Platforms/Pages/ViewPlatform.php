<?php

namespace App\Filament\Resources\Platforms\Pages;

use App\Filament\Resources\Platforms\PlatformResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPlatform extends ViewRecord
{
    protected static string $resource = PlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        foreach ($this->record->getTranslatableAttributes() as $attribute) {
            $data[$attribute] = $this->record->getTranslations($attribute);
        }

        return $data;
    }
}
