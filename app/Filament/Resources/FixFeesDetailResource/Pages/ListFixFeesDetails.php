<?php

namespace App\Filament\Resources\FixFeesDetailResource\Pages;

use App\Filament\Resources\FixFeesDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFixFeesDetails extends ListRecords
{
    protected static string $resource = FixFeesDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
