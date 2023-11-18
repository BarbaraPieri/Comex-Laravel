
   <x-layout title="Categorias">
   <ul>
        @foreach ($categorias as $categoria)
            <li>{{ $categoria }}</li>
            @endforeach
    </ul>
    </x-layout>
