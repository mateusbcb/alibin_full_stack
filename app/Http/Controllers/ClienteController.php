<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::orderBy('nome', 'asc')->paginate(10);

        return view('cliente.clientes', [
            'clientes' => $clientes,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'      => 'required|min:3|max:40',
            'telefone'  => 'required',
            'documento' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'nome.min' => 'o campo nome precisa ter no minimo 3 caracteres.',
            'nome.max' => 'o campo nome precisa ter no máximo 40 caracteres.',
        ];

        $request->validate($regras, $feedback);

        $clienteSave = Cliente::create($request->all())->with('success', 'Cliente cadstrado com sucesso');

        if ($clienteSave) {
            return redirect()->route('cliente.index')->with('success', 'Cliente criado Com sucesso!');
        }

        return redirect()->back()->with('error', 'Problema ao criar um novo cliente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.create', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->back()->with('success', 'Cliente editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente excluido com sucesso!');
    }

    public function consulta()
    {
        return view('cliente.consulta');
    }

    public function consultar(Request $request)
    {
        $clientes = Cliente::where('nome', 'like', '%'.$request->nome.'%')
        ->where('telefone', 'like', '%'.$request->telefone.'%')
        ->where('documento', 'like', '%'.$request->documento.'%')
        ->where('cep', 'like', '%'.$request->cep.'%')
        ->where('rua', 'like', '%'.$request->rua.'%')
        ->where('municipio', 'like', '%'.$request->municipio.'%')
        ->where('complemento', 'like', '%'.$request->complemento.'%')
        ->where('uf', 'like', '%'.$request->uf.'%')
        ->orderBy('nome', 'asc')
        ->paginate(10);
        return view('cliente.clientes', [
            'clientes' => $clientes,
            'request' => $request->all(),
        ]);
    }
}
