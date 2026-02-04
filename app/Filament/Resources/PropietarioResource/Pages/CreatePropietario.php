<?php

namespace App\Filament\Resources\PropietarioResource\Pages;

use App\Filament\Resources\PropietarioResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePropietario extends CreateRecord
{
    protected static string $resource = PropietarioResource::class;

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
            ->title('¡Propietario creado exitosamente!')
            ->body('El propietario ha sido creado correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje

}
