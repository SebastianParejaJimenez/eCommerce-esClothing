<?php

namespace App\Listeners;

use App\Models\EmailSubscriptions;
use App\Models\User;
use App\Notifications\NewProductsNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class NewProductsListener
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


        $users = User::where('newsletter', true)->get();
        foreach ($users as $user) {
            Notification::send($user, new NewProductsNotification($event->producto));
        }
    }
}
