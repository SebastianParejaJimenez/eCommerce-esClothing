<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
class NewsletterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $subscribers = DB::table('email_subscriptions')->get();

        // Send a notification to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::send('emails.newsletter', ['subscriber' => $subscriber], function ($mail) use ($subscriber, $event) {
                $mail->to($subscriber->email);
                $mail->subject('Nuevo producto');
                // Add information about the new product to the email
                $mail->body = 'Se ha creado un nuevo producto: ' . $event->product->nombre;
            });
        }
    }
}
