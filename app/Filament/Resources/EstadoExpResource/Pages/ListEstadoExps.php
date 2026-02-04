<?php

namespace App\Filament\Resources\EstadoExpResource\Pages;

use App\Filament\Resources\EstadoExpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstadoExps extends ListRecords
{
    protected static string $resource = EstadoExpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
