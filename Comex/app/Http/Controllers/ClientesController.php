<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
{
    $clientes = Cliente::all();
    return view('clientes.index', compact('clientes'));
}

public function create()
{
    return view('clientes.create');
}

public function store(ClienteRequest $request)
{
    Cliente::create($request->validated());
    return redirect()->route('clientes.index')->with('mensagemSucesso', 'Cliente criado com sucesso.');
}

public function edit(Cliente $cliente)
{
    return view('clientes.edit', compact('cliente'));
}

public function update(ClienteRequest $request, Cliente $cliente)
{
    $cliente->update($request->validated());
    return redirect()->route('clientes.index')->with('mensagemSucesso', 'Cliente atualizado com sucesso.');
}

public function destroy(Cliente $cliente)
{
    $cliente->delete();
    return redirect()->route('clientes.index')->with('mensagemSucesso', 'Cliente removido com sucesso.');
}

}
