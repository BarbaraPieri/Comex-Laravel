{{-- resources/views/categorias/create.blade.php --}}

<x-layout title="Nova Categoria">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar para Categorias</a>
    </div>

    <form action="{{ route('categorias.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus name="nome" class="form-control">

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
