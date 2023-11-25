<x-layout title="Produtos: {{ $categoria->nome }}">
    <a href="{{ route('produtos.create', ['categoria' => $categoria->id]) }}" class="btn btn-dark mb-2">Adicionar</a>

    {{-- Exibir mensagens de sucesso ou erro --}}
    @if(session('mensagemSucesso'))
        <div class="alert alert-success" role="alert">
            {{ session('mensagemSucesso') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ul class="list-group">
        @foreach ($produtos as $produto)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $produto->nome }}
                <span class="badge bg-secondary">
                    {{ $produto->quantidade_est }}
                </span>

                {{-- Botão para editar --}}
                <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                {{-- Formulário para exclusão --}}
                <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Botão para voltar para Categorias -->
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-2">Voltar para Categorias</a>

    <script>
        function atualizarProdutos() {
            $.ajax({
                url: "{{ route('produtos.index', ['categoria' => $categoria->id]) }}",
                method: 'GET',
                success: function(response) {
                    // Atualizar dinamicamente a lista de produtos na página
                    $('.list-group').html(response);
                },
                error: function(error) {
                    console.error('Erro ao atualizar produtos:', error);
                }
            });
        }
    </script>
</x-layout>
