<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $tittle }} - Controle de Séries</title>
        <!-- comando utilizado no mix <link rel="stylesheet" href="/sass/app.scss">-->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <h1>{{ $tittle }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        
            {{$slot }}
        </div>
    </body>
</html>