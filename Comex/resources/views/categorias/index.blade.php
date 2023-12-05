@extends('layouts.app')

@section('content')
    <x-layout title="Categorias">
        <a href="{{ route('categorias.create') }}" class="btn btn-dark mb-2">Adicionar</a>

        @if(session('success'))
            <div class="alert alert-success rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded">
                {{ session('error') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach ($categorias as $categoria)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('produtos.index', $categoria->id) }}">
                        {{ $categoria->nome }}
                    </a>

                    <span class="d-flex">
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary btn-sm">
                            E
                        </a>

                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                X
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </x-layout>
@endsection
