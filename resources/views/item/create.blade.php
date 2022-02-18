@extends('basico')

@section('title', 'Itens')

@section('content')
    
    <div class="col mx-auto">
        <h1 class="mt-5">Itens</h1>
        <div class="col-8 mx-auto">
            @component('item._components.subMenu')
            
            @endcomponent
            <form action="{{ route('item.store') }}" class="row g-3 needs-validation" method="POST" novalidate>
                <div class="bg-white p-4 rounded">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" id="nome" name="nome" value="{{  old('nome') }}" placeholder="Nome" required>
                        <label for="nome">Nome</label>
                        @error('nome')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <div class="form-floating col">
                            <input type="number" class="form-control {{ $errors->has('preco') ? 'is-invalid' : ''}}" id="preco" name="preco" value="{{  old('preco') }}" placeholder="preco" min="0.00" step="0.01" required>
                            <label for="preco">Preço</label>
                            @error('preco')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control {{ $errors->has('codigo') ? 'is-invalid' : ''}}" id="codigo" name="codigo" value="{{  old('codigo') }}" placeholder="codigo" required>
                        <label for="codigo">Código</label>
                        @error('codigo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 m-0">
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
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