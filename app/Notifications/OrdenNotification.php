<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Orden;

class OrdenNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Orden $orden)
    {
        $this->orden = $orden;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('¡Nuevo Pedido!.')
                    ->line($this->orden->user->name . ' Ha realizado un nuevo pedido por un total de: '. $this->orden->total . ' pesos')
                    ->action('Ir a ver los Detalles', route('detalles.pedidos', $this->orden->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->orden->id,
            'user_id' => $this->orden->user_id,
            'subtotal' => $this->orden->subtotal,
            'total' => $this->orden->total,
            'orden_date' => $this->orden->created_at,
            'name' => $this->orden->user->name,
        ];
    }
}
