<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orden;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','categoria', 'imagen', 'estado' ,'precio','created_at', 'updated_at', 'created_by', 'updated_by'];


    public function ordenProductos()
    {
        return $this->belongsToMany(Orden::class, 'orden_productos')
        ->withPivot(['cantidad']);
    }
}
