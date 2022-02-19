@extends('basico')

@section('title', 'Itens')

@section('content')
    <div class="col mx-auto">
        <h1 class="mt-5">ITENS</h1>
        <div class="col-10 mx-auto">
            @component('item._components.subMenu')
            
            @endcomponent
            <div class="table-responsive">
                <div class="bg-white p-4 mb-3 rounded">
                    <table class="table table-hover text-center sortable">
                        <thead>
                            <th class="col" onclick="sortTable(0)">ID</th>
                            <th class="col" onclick="sortTable(1)">Nome</th>
                            <th class="col" onclick="sortTable(2)">Preço</th>
                            <th class="col" onclick="sortTable(3)">Código e Barras</th>
                            <th class="col">Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <!-- Modal -->
                                <div class="modal fade" id="Modal_edit_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('item.update', $item->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" id="nome" name="nome" value="{{ $item->nome ?? old('nome') }}" placeholder="Nome" required style="font-size: 14px">
                                                        <label for="nome" style="font-size: 14px">Nome do item</label>
                                                        @error('nome')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('preco') ? 'is-invalid' : ''}}" id="preco" name="preco" value="{{ $item->preco ?? old('preco') }}" placeholder="preco" required style="font-size: 14px">
                                                        <label for="preco" style="font-size: 14px">preco do item</label>
                                                        @error('preco')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control {{ $errors->has('codigo') ? 'is-invalid' : ''}}" id="codigo" name="codigo" value="{{ $item->codigo ?? old('codigo') }}" placeholder="codigo" required style="font-size: 14px">
                                                        <label for="codigo" style="font-size: 14px">codigo do item</label>
                                                        @error('codigo')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar alteração</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
        
                                <tr class="item">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ 'R$ '.number_format( $item->preco, 2, ',', '.' ) }}</td>
                                    <td>{{ $item->codigo }}</td>
                                    <td class="d-flex justify-content-around">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm text-aqua" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Editar Item" data-bs-toggle="modal" data-bs-target="#Modal_edit_{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                        </button>
        
                                        <form action="{{ route('item.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm text-aqua" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Excluir Item">
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
                @if($items->total() > 10)
                    <div class="d-flex justify-content-between">
                        <div>Exibindo {{ $items->count() }} items de {{ $items->total() }} (de {{ $items->firstItem() }} a {{ $items->lastItem() }})</div>
                        
                        <div>{{ $items->appends($request)->links() }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection