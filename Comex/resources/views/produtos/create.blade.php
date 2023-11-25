<!-- resources/views/produtos/create.blade.php -->

<x-layout title="Novo Produto">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar para Categorias</a>
    </div>

    <form action="{{ route('produtos.store') }}" method="post">
        @csrf

        <input type="hidden" name="categoria_id" value="{{ $categoria->id }}">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" class="form-control" value="{{ old('descricao') }}">
        </div>

        <div class="mb-3">
            <label for="preco_un" class="form-label">Preço Unitário:</label>
            <input type="number" step="0.01" name="preco_un" class="form-control" value="{{ old('preco_un') }}" required>
            @error('preco_un')
             <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade_est" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade_est" class="form-control" value="{{ old('quantidade_est') }}" required>
         @error('quantidade_est')
          <div class="text-danger">{{ $message }}</div>
         @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>
