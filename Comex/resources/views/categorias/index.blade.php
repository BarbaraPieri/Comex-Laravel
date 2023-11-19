
   <x-layout title="Categorias">
    <a href="/categorias/criar" class="btn btn-dark mb-2">Adicionar</a>

   <ul class="List-group">
        @foreach ($categorias as $categoria)
            <li class="List-group-item">{{ $categoria }}</li>
            @endforeach
    </ul>
    </x-layout>
