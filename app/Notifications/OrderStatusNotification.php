<?php

namespace App\Notifications;

use App\Models\Orden;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    public function __construct(Orden $orden)
    {
        //
        $this->orden = $orden;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Estado de Pedido.')
                    ->line('Su pedido con ID: ' . $this->orden->id . ', su estado ha sido cambiado a: ' . $this->orden->estado . ' Recientemente.')
                    ->line('Si esto es un error por favor contactar con nosotros.')
                    ->action('Ver sus Pedidos', route('pedidos_hechos'))
                    ->line('Gracias por Seleccionarnos!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
