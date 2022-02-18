@extends('basico')

@section('title', 'Cliente')

@section('content')

    <div class="col mx-auto">
        <h1 class="mt-5">CLIENTE - {{ $cliente->nome }}</h1>
        <div class="col-10 mx-auto">
            @component('cliente._components.subMenu')
            
            @endcomponent
            <div class="table-responsive">
                <div class="bg-white p-4 mb-3 rounded">
                    <table class="table table-hover text-center" id="sortTable">
                        <tr>	
                            <td>nome:</td>
                            <td>{{ $cliente->nome }}</td>
                        </tr>
                        <tr>	
                            <td>telefone:</td>
                            <td>{{ $cliente->telefone }}</td>
                        </tr>
                        <tr>	
                            <td>documento:</td>
                            <td>{{ $cliente->documento }}</td>
                        </tr>
                        <tr>	
                            <td>uf:</td>
                            <td>{{ $cliente->uf }}</td>
                        </tr>
                        <tr>	
                            <td>municipio:</td>
                            <td>{{ $cliente->municipio }}</td>
                        </tr>
                        <tr>	
                            <td>cep:</td>
                            <td>{{ $cliente->cep }}</td>
                        </tr>
                        <tr>	
                            <td>rua:</td>
                            <td>{{ $cliente->rua }}</td>
                        </tr>
                        <tr>	
                            <td>complemento:</td>
                            <td>{{ $cliente->complemento }}</td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>

@endsection