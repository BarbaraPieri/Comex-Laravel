<x-layout title="Nova Categoria">
    <x-categorias.form :action="route('categorias.store')" :nome="old('nome')" :update="false"/>
</x-layout>
