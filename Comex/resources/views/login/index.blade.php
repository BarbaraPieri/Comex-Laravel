<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-3">
        <h1>Login</h1>

        <form method="post" class="mt-2">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="row mb-1">
                <div class="col">
                    <button class="btn btn-primary mt-3">
                        Entrar
                    </button>
                </div>

                <div class="col">
                    <a href="{{ route('users.create')}}" class="btn btn-secondary mt-3">
                        Registrar
                    </a>
                </div>

                <div class="col-md-2 offset-md-7 text-right">
                    <a href="{{ route('categorias.index') }}" class="btn btn-info mt-3">
                        Lista de Categorias
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
