<x-layout title="Nova Categoria">
    <form action="/categorias/salvar" method="post">
        @csrf
        <div class="mb-3">
        <label for="nome" class="form-Label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control">
        </div>

        <button type="submit" class="btn- btn-primary">Adicionar</button>
    </form>
</x-layout>
