@extends('basico')

@section('title', 'Adicionar item')

@section('content')
    
    <div class="col mx-auto">
        <h1 class="mt-5">ADICIONAR ITEM AO CLIENTE - {{ $cliente->nome }}</h1>
        <div class="col-10 mx-auto">
            @component('item._components.subMenu')
            
            @endcomponent
            <form action="{{ route('item.adicionar', $cliente->id) }}" class="row g-3 needs-validation" method="POST" novalidate>
                <div class="bg-white p-4 mb-3 rounded">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <select class="form-select {{ $errors->has('item') ? 'is-invalid' : ''}}" name="item" id="item" required>
                            <option value="0">-- Selecione um item --</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                        <label for="item">Item</label>
                        @error('item')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 m-0">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <h5>Itens do Cliente - {{ $cliente->nome }}</h5>
                <div class="bg-white p-4 mb-3 rounded">
                    @if(count($cliente->items) > 0)
                        <table class="table table-hover text-center" id="sortTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            @foreach ($cliente->items as $item)    
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nome }}</td>
                                    <td>
                                        <a href="{{ route('item.remover', ['cliente' => $cliente->id, 'item' => $item->id]) }}" class="btn text-aqua">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            
                    @else
                        <p>Nenhum item</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            (function () {
                'use strict'
              
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')
              
                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
              
                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    @endsection
@endsection