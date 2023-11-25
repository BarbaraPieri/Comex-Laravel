<x-layout title="Editar Produto '{{ $produto->nome }}'">

    <form action="{{ route('produtos.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $produto->descricao) }}">
        </div>

        <div class="mb-3">
            <label for="preco_un" class="form-label">Preço Unitário:</label>
            <input type="number" step="0.01" name="preco_un" class="form-control" value="{{ old('preco_un', $produto->preco_un) }}" required>
            @error('preco_un')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade_est" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade_est" class="form-control" value="{{ old('quantidade_est', $produto->quantidade_est) }}" required>
            @error('quantidade_est')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
