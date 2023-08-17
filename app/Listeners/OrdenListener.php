<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\OrdenNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class OrdenListener
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
        //
        
        User::where('rol_id', 1)
        ->each(function(User $user) use ($event){
            Notification::send($user, new OrdenNotification($event->orden));
        });
/*         ->whereNotIn('id', $event->orden->user_id)
 */
    }
}
