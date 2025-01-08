<?php

namespace App\Filament\Resources\KetentuanResource\Pages;

use App\Filament\Resources\KetentuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKetentuan extends EditRecord
{
    protected static string $resource = KetentuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
