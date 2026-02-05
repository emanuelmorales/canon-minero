<?php

namespace App\Filament\Resources\MinaResource\Pages;

use App\Filament\Resources\MinaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinas extends ListRecords
{
    protected static string $resource = MinaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
