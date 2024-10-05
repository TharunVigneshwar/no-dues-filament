<?php

namespace App\Filament\Resources\FixFeesDetailResource\Pages;

use App\Filament\Resources\FixFeesDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFixFeesDetail extends EditRecord
{
    protected static string $resource = FixFeesDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
