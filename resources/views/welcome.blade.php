<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .nav-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #343a40;
            padding: 1em;
            color: white;
        }
        .nav-bar a {
            text-decoration: none;
            color: white;
            margin-left: 1em;
        }
        .nav-bar a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2em;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 1em;
            color: #343a40;
            text-align: center;
        }
        .form-container {
            margin-bottom: 2em;
            text-align: center;
        }
        form {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type="text"] {
            padding: 0.5em;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 70%;
        }
        button[type="submit"] {
            padding: 0.5em 1em;
            font-size: 1em;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5em;
        }
        .grid-item {
            background-color: white;
            padding: 1.5em;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .grid-item:hover {
            transform: translateY(-5px);
        }
        .grid-item h2 {
            margin: 0 0 0.5em;
            font-size: 1.5em;
            color: #343a40;
        }
        .grid-item p {
            margin: 0.5em 0;
            color: #6c757d;
        }
        .disponible {
            font-weight: bold;
            color: #28a745;
        }
        .no-disponible {
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
