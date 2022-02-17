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
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente.clientes', [
            'clientes' => $clientes,
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
            return redirect()->route('cliente.index')->with('success', 'Cliente Criado Com sucesso!');
        }

        return redirect()->back()->with('error', 'Problema ao criar um novo cliente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
