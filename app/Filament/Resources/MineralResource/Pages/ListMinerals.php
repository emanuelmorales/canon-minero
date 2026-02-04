<?php

namespace App\Filament\Resources\MineralResource\Pages;

use App\Filament\Resources\MineralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinerals extends ListRecords
{
    protected static string $resource = MineralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
