<?php

namespace App\Notifications;

use App\Models\Producto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProductsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Producto $producto)
    {
        //
        $this->producto = $producto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
        ->line('¡Nuevos Productos Disponibles en esClothing!')
        ->line('Nombre del Nuevo Producto: '. $this->producto->nombre . '.')
        ->line('Compralo ahora mismo por: '. $this->producto->precio . '.')
        ->action('Puedes verlo acá', route('productos.show', ['id' => $this->producto->id, 'slug' => $this->producto->slug]))
        ->line('¡Gracias por estas subscrito a nuestro Email!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
