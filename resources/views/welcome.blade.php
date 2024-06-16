<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .nav-bar {
            display: flex;
            justify-content: flex-end;
            padding: 1em;
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }
        .nav-bar a {
            margin-left: 1em;
            text-decoration: none;
            color: #007bff;
        }
        .nav-bar a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 2em;
        }
        .form-container {
            margin-bottom: 1em;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1em;
        }
        .grid-item {
            background-color: #f8f9fa;
            padding: 1em;
            border: 1px solid #e9ecef;
            border-radius: 5px;
        }
        .grid-item h2 {
            margin: 0 0 0.5em;
            font-size: 1.2em;
        }
        .grid-item p {
            margin: 0.2em 0;
        }
        .grid-item .disponible {
            font-weight: bold;
            color: #28a745;
        }
        .grid-item .no-disponible {
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="nav-bar">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}">Cuenta</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="container">
        <h1>Lista de Libros</h1>
        <div class="form-container">
            <form action="{{ route('welcome') }}" method="GET">
                <input type="text" name="query" placeholder="Buscar libros..." value="{{ request('query') }}">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <div class="grid-container">
            @foreach ($libros as $libro)
                <div class="grid-item">
                    <h2>{{ $libro->nombre_libro }}</h2>
                    <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                    <p><strong>Año:</strong> {{ $libro->año }}</p>
                    <p><strong>Editorial:</strong> {{ $libro->editorial }}</p>
                    <p class="{{ $libro->disponible ? 'disponible' : 'no-disponible' }}">
                        {{ $libro->disponible ? 'Disponible' : 'Reservado' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
