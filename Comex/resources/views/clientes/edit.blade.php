<x-layout title="Editar Cliente">
    <a href="{{ route('clientes.index') }}" class="btn btn-dark mb-2">Voltar para Lista de Clientes</a>

    @if ($errors->any())
        <div class="alert alert-danger rounded">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clientes.update', $cliente) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $cliente->cpf) }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}" required>
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua:</label>
            <input type="text" name="rua" class="form-control" value="{{ old('rua', $cliente->rua) }}" required>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número:</label>
            <input type="text" name="numero" class="form-control" value="{{ old('numero', $cliente->numero) }}" required>
        </div>

        <div class="mb-3">
            <label for="complemento" class="form-label">Complemento:</label>
            <input type="text" name="complemento" class="form-control" value="{{ old('complemento', $cliente->complemento) }}">
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro:</label>
            <input type="text" name="bairro" class="form-control" value="{{ old('bairro', $cliente->bairro) }}" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" name="cidade" class="form-control" value="{{ old('cidade', $cliente->cidade) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <input type="text" name="estado" class="form-control" value="{{ old('estado', $cliente->estado) }}" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</x-layout>
