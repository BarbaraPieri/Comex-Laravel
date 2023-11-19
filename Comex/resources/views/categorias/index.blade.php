
   <x-layout title="Categorias">
    <a href="{{ route('categorias.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-sucess">
        {{ $mensagemSucesso}}
    </div>
    @endisset

   <ul class="List-group">
        @foreach ($categorias as $categoria)
            <li class="List-group-item d-flex justify-content-between align-items-center">
                {{ $categoria->nome }}

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button class= "btn btn-danger btn-sm">
                  X
                </button>
                </form>
            </li>
            @endforeach
    </ul>
    </x-layout>
