<?php

namespace App\Filament\Resources\GrupoMineroResource\Pages;

use App\Filament\Resources\GrupoMineroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGrupoMineros extends ListRecords
{
    protected static string $resource = GrupoMineroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
