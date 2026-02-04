<?php

namespace App\Filament\Resources\PropietarioResource\Pages;

use App\Filament\Resources\PropietarioResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPropietario extends EditRecord
{
    protected static string $resource = PropietarioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('¡Propietario eliminado exitosamente!')
                        ->body('El propietario ha sido eliminado correctamente.')
                        ->success()
                ),
        ];
    }

    // funcion creada para redireccionar a la lista de libros despues de crear uno nuevo
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    // fin funcion redireccion

    // deshabilitar notificación por defecto
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }
    // fin deshabilitar notificación por defecto

    //personalizar el mensaje despues de crear un libro
    protected function afterSave(): void
    {
        Notification::make()
            ->title('¡Propietario actualizado exitosamente!')
            ->body('El propietario ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje
}
