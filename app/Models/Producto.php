<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orden;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Talla;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','categoria', 'imagen', 'estado' ,'precio', 'created_at', 'updated_at'];


    public function ordenProductos()
    {
        return $this->belongsToMany(Orden::class, 'orden_productos')
        ->withPivot(['cantidad']);
    }

    public function tallas()
    {
        return $this->belongsToMany(Talla::class);
    }
}
