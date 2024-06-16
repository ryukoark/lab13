@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Buscar libros..." value="{{ request('search') }}" class="border rounded px-3 py-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buscar</button>
    </form>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-3 mb-4 rounded">{{ session('error') }}</div>
    @endif

    <table class="table-auto w-full border-collapse bg-white">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Código</th>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Año</th>
                <th class="border px-4 py-2">Autor</th>
                <th class="border px-4 py-2">Editorial</th>
                <th class="border px-4 py-2">Disponibilidad</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $libro->codigo_libro }}</td>
                    <td class="border px-4 py-2">{{ $libro->nombre_libro }}</td>
                    <td class="border px-4 py-2">{{ $libro->año }}</td>
                    <td class="border px-4 py-2">{{ $libro->autor }}</td>
                    <td class="border px-4 py-2">{{ $libro->editorial }}</td>
                    <td class="border px-4 py-2">{{ $libro->disponible ? 'Disponible' : 'No Disponible' }}</td>
                    <td class="border px-4 py-2">
                        @if($libro->disponible)
                            <form action="{{ route('reservar', $libro->codigo_libro) }}" method="POST">
                                @csrf
                                <input type="date" name="fecha_devolucion" required class="border rounded px-3 py-2">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Reservar</button>
                            </form>
                        @else
                            <span class="text-gray-500">No disponible</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



