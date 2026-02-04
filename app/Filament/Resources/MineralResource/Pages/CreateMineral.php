<?php

namespace App\Filament\Resources\MineralResource\Pages;

use App\Filament\Resources\MineralResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMineral extends CreateRecord
{
    protected static string $resource = MineralResource::class;

    // funcion creada para redireccionar a la lista de Localidades despues de crear uno nuevo
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    //fin función creada

    // deshabilitar notificación por defecto
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }
    // fin deshabilitar notificación por defecto

    //personalizar el mensaje despues de crear un libro
    protected function afterCreate(): void
    {
        Notification::make()
            ->title('¡Mineral creado exitosamente!')
            ->body('El mineral ha sido creado correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje
}
