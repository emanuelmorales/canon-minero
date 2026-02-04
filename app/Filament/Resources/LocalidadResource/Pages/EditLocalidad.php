<?php

namespace App\Filament\Resources\LocalidadResource\Pages;

use App\Filament\Resources\LocalidadResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditLocalidad extends EditRecord
{
    protected static string $resource = LocalidadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('¡Localidad eliminada exitosamente!')
                        ->body('La localidad ha sido eliminada correctamente.')
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
            ->title('¡Localidad actualizado exitosamente!')
            ->body('La localidad ha sido actualizada correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje
}
