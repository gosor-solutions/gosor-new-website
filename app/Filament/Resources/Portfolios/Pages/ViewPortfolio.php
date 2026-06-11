<?php

namespace App\Filament\Resources\Portfolios\Pages;

use App\Filament\Resources\Portfolios\PortfolioResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPortfolio extends ViewRecord
{
    protected static string $resource = PortfolioResource::class;

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
