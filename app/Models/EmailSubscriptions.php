<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmailSubscriptions extends Model
{
    protected $table = 'email_subscriptions'; // Especifica el nombre real de la tabla


    use HasFactory;
    use Notifiable;


    protected $fillable = [
        'email',
        'estado',
        'created_at',
    ];
}
