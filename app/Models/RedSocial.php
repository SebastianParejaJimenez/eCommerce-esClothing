<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    use HasFactory;
    protected $table = 'redes_sociales';
    protected $fillable = ['link_twitter', 'link_facebook', 'link_instagram', 'link_whatsapp'];

}
