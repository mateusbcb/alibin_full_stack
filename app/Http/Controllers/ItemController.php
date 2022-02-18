<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cliente_Item;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = item::paginate(10);

        return view('item.items', [
            'items' => $items,
            'request' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $clientes)
    {
        return view('item.create', [
            'clientes' => $clientes->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        item::create($request->all());

        return redirect()->route('item.index')->with('success', 'Item criado com sucesso!');
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
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return redirect()->route('item.index')->with('success', 'Item atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->back()->with('success', 'Item excluido com sucesso!');
    }

    public function adicionarShow($id)
    {
        $cliente = Cliente::find($id);
        
        $items = Item::all();

        return view('item.adicionar_show', [
            'items' => $items,
            'cliente' => $cliente,
        ]);
    }

    public function adicionar(Cliente $cliente, Request $request)
    {
        $regras = [
            'item' => 'exists:items,id|required',
        ];

        $feedback = [
            'exists' => 'Item não encontrado',
        ];

        $request->validate($regras, $feedback);

        $clienteItem = new Cliente_Item();
        $user_id =Auth::user()->id;

        $clienteItem->cliente_id = $cliente->id;
        $clienteItem->item_id = $request->item;
        $clienteItem->user_id = $user_id;

        $clienteItem->save();

        return redirect()->route('item.adicionar', $cliente->id)->with('success', 'Item adicionado com sucesso');
    }

    public function remover(Cliente $cliente, item $item)
    {
        
        $clienteItem = new Cliente_Item();

        $clienteItem->where('item_id', $item->id)->where('cliente_id', $cliente->id)->delete();
        
        return redirect()->route('item.adicionar', $cliente->id)->with('success', 'Item removido com sucesso!');
    }

    public function consulta()
    {
        return view('item.consulta');
    }

    public function consultar(Request $request)
    {
        $items = Item::where('nome', 'like', '%'.$request->nome.'%')
        ->where('preco', 'like', '%'.$request->preco.'%')
        ->where('codigo', 'like', '%'.$request->codigo.'%')
        ->paginate(10);

        return view('item.items', [
            'items' => $items,
            'request' => $request->all(),
        ]);
    }
}
