<ul class="list-group lista-de-produtos">
    @foreach ($produtos as $produto)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $produto->nome }}
            <span class="badge bg-secondary">
                {{ $produto->quantidade_est }}
            </span>

            <span class="d-flex">
                <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">
                    Editar
                </a>

                <form action="{{ route('produtos.destroy', $produto->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                        Excluir
                    </button>
                </form>
            </span>
        </li>
    @endforeach
</ul>
