@extends('basico')

@section('title', 'Itens')

@section('content')
    <h1>Itens</h1>

    @foreach ($itens as $item)
        <p>Nome da item: {{ $item->nome }}</p>
    @endforeach
@endsection