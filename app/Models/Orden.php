<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Orden extends Model
{
    protected $table = 'ordenes'; // Especifica el nombre real de la tabla

    use HasFactory;
    protected $fillable = [
        'user_id',
        'subtotal',
    ];
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'orden_productos')
            ->withPivot(['cantidad']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
