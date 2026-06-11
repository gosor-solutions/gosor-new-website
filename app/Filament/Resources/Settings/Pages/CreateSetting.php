<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $type = $data['type'] ?? 'text';
        
        if (in_array($type, ['text', 'url', 'email', 'tel'])) {
            $data['value'] = $data['text_value'] ?? null;
        } elseif ($type === 'textarea') {
            $data['value'] = $data['textarea_value'] ?? null;
        } elseif ($type === 'image') {
            $data['value'] = $data['image_value'] ?? null;
        }
        
        unset($data['text_value'], $data['textarea_value'], $data['image_value']);

        return $data;
    }
}
