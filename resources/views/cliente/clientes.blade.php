@extends('basico')

@section('title', 'Clientes')

@section('content')
    <h1>Clientes</h1>

    @foreach ($clientes as $cliente)
        <p>Nome do Cliente: {{ $cliente->nome }}</p>
        @foreach ($cliente->items as $item)
            <p>{{ $item->nome }}</p>
        @endforeach
    @endforeach
@endsection