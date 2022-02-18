@extends('basico')

@section('title', 'Clientes')

@section('content')
    
    <div class="col mx-auto">
        <h1 class="mt-5">Clientes</h1>
        <div class="col-8 mx-auto">
            @component('cliente._components.subMenu')
            
            @endcomponent
            <form action="{{ route('cliente.store') }}" class="row g-3 needs-validation" method="POST" novalidate>
                <div class="bg-white p-4 rounded">
                    @csrf
                    <div class="row gx-2 gy-2 align-items-center mb-4">
                        <h5>Informações pesoais</h5>
                        <div class="col-12">
                            <span style="color: red">*</span>
                            <div class="form-floating">
                                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" id="nome" name="nome" value="{{  old('nome') }}" placeholder="Nome" required>
                                <label for="nome">Nome Completo</label>
                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <span style="color: red">*</span>
                            <div class="form-floating">
                                <input type="tel" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : ''}}" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="telefone" required>
                                <label for="telefone">Telefone</label>
                                @error('telefone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <span style="color: red">*</span>
                            <div class="form-floating">
                                <input type="text" class="form-control {{ $errors->has('documento') ? 'is-invalid' : ''}}" id="documento" name="documento" value="{{ old('documento') }}" placeholder="documento" required>
                                <label for="documento">Documento (RG ou CPF)</label>
                                @error('documento')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row gx-2 gy-2 align-items-center">
                        <h5>Endereço</h5>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" placeholder="cep">
                                <label for="cep">CEP</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="rua" name="rua" value="{{ old('rua') }}" placeholder="rua">
                                <label for="rua">Rua</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="municipio" name="municipio" value="{{ old('municipio') }}" placeholder="municipio">
                                <label for="municipio">Municipio</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}" placeholder="complemento">
                                <label for="complemento">Complemento</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="uf" name="uf" value="{{ old('uf') }}" placeholder="uf">
                                <label for="uf">UF</label>
                            </div>
                        </div>
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