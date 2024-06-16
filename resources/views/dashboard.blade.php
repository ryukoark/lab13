@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <form action="{{ route('dashboard') }}" method="GET" class="mb-4 flex items-center">
        <input type="text" name="search" placeholder="Buscar libros..." value="{{ request('search') }}" class="border rounded-l px-3 py-2 w-2/3">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Buscar</button>
    </form>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-3 mb-4 rounded">{{ session('error') }}</div>
    @endif

    <div class="-mx-4 overflow-x-auto">
        <table class="min-w-full bg-white border-collapse rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">Código</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Año</th>
                    <th class="px-4 py-2">Autor</th>
                    <th class="px-4 py-2">Editorial</th>
                    <th class="px-4 py-2">Disponibilidad</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr class="text-gray-800">
                        <td class="border px-4 py-2">{{ $libro->codigo_libro }}</td>
                        <td class="border px-4 py-2">{{ $libro->nombre_libro }}</td>
                        <td class="border px-4 py-2">{{ $libro->año }}</td>
                        <td class="border px-4 py-2">{{ $libro->autor }}</td>
                        <td class="border px-4 py-2">{{ $libro->editorial }}</td>
                        <td class="border px-4 py-2">
                            @if($libro->disponible)
                                <span class="text-green-600 font-semibold">Disponible</span>
                            @else
                                <span class="text-red-600 font-semibold">No Disponible</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if($libro->disponible)
                                <form action="{{ route('reservar', $libro->codigo_libro) }}" method="POST" class="flex items-center">
                                    @csrf
                                    <input type="date" name="fecha_devolucion" required class="border rounded-l px-3 py-2">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">Reservar</button>
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
</div>
@endsection
