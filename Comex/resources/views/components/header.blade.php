<div class="header container mt-3 mb-3">
    <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded">
        @auth
            <!-- Exibir conteúdo para usuário logado -->
            <div>
                Bem-vindo, {{ auth()->user()->name }}!
            </div>
            <div class="ml-auto"> <!-- Adicione a classe ml-auto para empurrar para a direita -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            </div>
        @else
            <!-- Exibir conteúdo para usuário não logado -->
            <div>
                <form action="{{ route('login') }}" method="get">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        @endauth
    </div>
</div>
