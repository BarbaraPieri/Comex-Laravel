<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Adicione links para seus estilos CSS, scripts JS, etc., conforme necessário -->
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Adicione scripts JS, se necessário -->

    <!-- Exemplo de uso do Laravel Mix (caso você o esteja utilizando) -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
