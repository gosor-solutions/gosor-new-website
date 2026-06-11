<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $type = $data['type'] ?? 'text';
        
        if (in_array($type, ['text', 'url', 'email', 'tel'])) {
            $data['text_value'] = $data['value'] ?? null;
        } elseif ($type === 'textarea') {
            $data['textarea_value'] = $data['value'] ?? null;
        } elseif ($type === 'image') {
            $data['image_value'] = $data['value'] ?? null;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
