{{-- resources/views/categorias/edit.blade.php --}}

<x-layout title="Editar Categoria '{{ $categoria->nome }}'">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar para Categorias</a>
    </div>

    <x-categorias.form :action="route('categorias.update', $categoria->id)" :nome="$categoria->nome" :update="true"/>
</x-layout>
