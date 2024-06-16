<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $libros = Libro::where('nombre_libro', 'LIKE', "%{$query}%")->get();
        return view('welcome', compact('libros'));
    }
}
