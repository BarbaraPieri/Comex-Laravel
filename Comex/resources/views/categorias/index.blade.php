@extends('layouts.app')

@section('content')
    <x-layout title="Categorias">
        @auth
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('categorias.create') }}" class="btn btn-dark">Adicionar</a>
                </div>
                <div class="col text-end">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Voltar para o Dashboard</a>
                </div>
            </div>
        @endauth

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
                        @auth
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
                        @endauth
                    </span>
                </li>
            @endforeach
        </ul>
    </x-layout>
@endsection
