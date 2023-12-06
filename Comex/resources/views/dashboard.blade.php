
<x-layout title="Dashboard">
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="{{ route('categorias.index') }}" class="btn btn-success btn-block mb-3">Cadastro de Categorias</a>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('clientes.index') }}" class="btn btn-warning btn-block mb-3">Cadastro de Clientes</a>
        </div>
    </div>
</x-layout>
