<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $primaryKey = 'id_reserva';
    protected $fillable = ['codigo_libro', 'id_usuario', 'dni', 'fecha_devolucion'];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'codigo_libro');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}