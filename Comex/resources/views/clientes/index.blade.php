<x-layout title="Clientes">
    <a href="{{ route('clientes.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @if(session('mensagemSucesso'))
        <div class="alert alert-success rounded">
            {{ session('mensagemSucesso') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach ($clientes as $cliente)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $cliente->nome }}

                <span class="d-flex">
                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('clientes.destroy', $cliente) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                            Excluir
                        </button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
