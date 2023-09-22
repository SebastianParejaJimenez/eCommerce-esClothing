<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Talla extends Model
{
    use HasFactory;
    protected $table = 'tallas';
    protected $fillable = ['talla'];


    
    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
