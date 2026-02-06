<?php

namespace App\Filament\Resources\PagoResource\Pages;

use App\Filament\Resources\PagoResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;


class EditPago extends EditRecord
{
    protected static string $resource = PagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('¡Pago eliminado exitosamente!')
                        ->body('El pago ha sido eliminado correctamente.')
                        ->success()
                ),
        ];
    }

    // funcion creada para redireccionar a la lista 
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

    //personalizar el mensaje despues de crear
    protected function afterSave(): void
    {
        Notification::make()
            ->title('¡Pago actualizado exitosamente!')
            ->body('El pago ha sido actualizado correctamente.')
            ->success()
            ->send();
    }
    // fin personalizacion mensaje
}
