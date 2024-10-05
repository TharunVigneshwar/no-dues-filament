<?php

namespace App\Filament\Resources\NoDuesResource\Pages;

use App\Filament\Resources\NoDuesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNoDues extends EditRecord
{
    protected static string $resource = NoDuesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
