<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $primaryKey = 'codigo_libro';
    public $incrementing = false; // ya que la clave primaria no es un entero autoincremental
    protected $keyType = 'string';

    protected $fillable = [
        'codigo_libro',
        'nombre_libro',
        'año',
        'autor',
        'editorial',
        'disponible',
    ];
}
