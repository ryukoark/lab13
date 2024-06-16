<?php

// app/Http/Controllers/ReservaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $libros = Libro::where('nombre_libro', 'LIKE', "%{$search}%")
                       ->orWhere('autor', 'LIKE', "%{$search}%")
                       ->orWhere('editorial', 'LIKE', "%{$search}%")
                       ->get();

        return view('dashboard', compact('libros'));
    }

    public function reservar(Request $request, $codigo_libro)
    {
        $libro = Libro::findOrFail($codigo_libro);

        if (!$libro->disponible) {
            return redirect()->back()->with('error', 'El libro no está disponible.');
        }

        $request->validate([
            'fecha_devolucion' => 'required|date|after:today',
        ]);

        $reserva = new Reserva();
        $reserva->codigo_libro = $libro->codigo_libro;
        $reserva->id_usuario = Auth::id();
        $reserva->dni = Auth::user()->dni;
        $reserva->fecha_devolucion = $request->input('fecha_devolucion');
        $reserva->save();

        $libro->disponible = false;
        $libro->save();

        return redirect()->route('dashboard')->with('success', 'Libro reservado con éxito.');
    }
}
