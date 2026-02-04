<?php

namespace App\Filament\Resources\EstadoExpResource\Pages;

use App\Filament\Resources\EstadoExpResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditEstadoExp extends EditRecord
{
    protected static string $resource = EstadoExpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('¡Estado de expte. eliminado exitosamente!')
                        ->body('El estado de expte. ha sido eliminado correctamente.')
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
            ->title('¡Estado de expte. actualizado exitosamente!')
            ->body('El estado de expte. ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje
}
