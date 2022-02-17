@extends('basico')

@section('title', 'Clientes')

@section('content')
    @component('cliente._components.subMenu')
        
    @endcomponent

    <div class="row mt-2 px-3">
        <h1>Clientes</h1>
        <div class="col-8 mx-auto">
            <div class="table-responsive">
                <table class="table table-hover bg-light">
                    <thead>
                        <th class="col-1">ID</th>
                        <th class="col-8">Nome</th>
                        <th class="col-1">Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <!-- Modal -->
                            <div class="modal fade" id="Modal_{{ $cliente->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Itens</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if(count($cliente->items) > 0)
                                            <div class="row bg-light mx-auto p-0">
                                                <div class="row mx-auto p-0">
                                                    <div class="col">ID</div>
                                                    <div class="col">Nome</div>
                                                    <div class="col">Ação</div>
                                                    @foreach ($cliente->items as $item)
                                                        <div class="row list-group-item-action m-0">
                                                            <div class="col">
                                                                {{ $item->id }}
                                                            </div>
                                                            <div class="col">
                                                                {{ $item->nome }}
                                                            </div>
                                                            <div class="col">
                                                                Excluir item
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <p>Cliente {{ $cliente->nome }} não possui itens, clique <a href="" class="">aqui</a> para adicionar itens ao cliente!</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="Modal_edit_{{ $cliente->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('cliente.edit', $cliente->id) }}" method="post">
                                            <input type="text" value="{{ $cliente->nome }}">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary">Salvar alteração</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td class="d-flex justify-content-around">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_{{ $cliente->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                        <span class="text-black-50">
                                            {{ count($cliente->items) }}
                                        </span>
                                    </button>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_edit_{{ $cliente->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </button>

                                    {{--  <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-sm">Editar</a>  --}}
                                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection