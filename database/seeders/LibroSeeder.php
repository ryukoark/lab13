<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    public function run()
    {
        $libros = [
            ['codigo_libro' => '1', 'nombre_libro' => 'Cien años de soledad', 'año' => 1967, 'autor' => 'Gabriel García Márquez', 'editorial' => 'Sudamericana', 'disponible' => true],
            ['codigo_libro' => '2', 'nombre_libro' => 'Don Quijote de la Mancha', 'año' => 1605, 'autor' => 'Miguel de Cervantes', 'editorial' => 'Francisco de Robles', 'disponible' => false],
            ['codigo_libro' => '3', 'nombre_libro' => '1984', 'año' => 1949, 'autor' => 'George Orwell', 'editorial' => 'Secker & Warburg', 'disponible' => true],
            ['codigo_libro' => '4', 'nombre_libro' => 'La Odisea', 'año' => -800, 'autor' => 'Homero', 'editorial' => 'Griego Antiguo', 'disponible' => true],
            ['codigo_libro' => '5', 'nombre_libro' => 'Matar a un ruiseñor', 'año' => 1960, 'autor' => 'Harper Lee', 'editorial' => 'J.B. Lippincott & Co.', 'disponible' => false],
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
