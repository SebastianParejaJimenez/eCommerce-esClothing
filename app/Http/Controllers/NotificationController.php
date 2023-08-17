<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function markAllNotifications(){
        Auth()->user()->unreadNotifications->markAsRead();
        redirect()->route('pedidos');
    }


    public function markOneNotification($notification_id, $orden_id){
        Auth()->user()->unreadNotifications->when($notification_id, function($query) use ($notification_id){
            return $query->where('id', $notification_id);
        })->markAsRead();

        $orden = Orden::find($orden_id); 
        redirect()->route('detalles.pedidos');

    }
    

}
