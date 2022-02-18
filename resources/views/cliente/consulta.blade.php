@extends('basico')

@section('title', 'Clientes')

@section('content')
    
    <div class="col mx-auto">
        <h1 class="mt-5">CONSULTAR CLIENTE</h1>
        <div class="col-10 mx-auto">
            @component('cliente._components.subMenu')
            
            @endcomponent
            <form action="{{ route('cliente.consultar') }}" class="row g-3 needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row gx-2 gy-2 align-items-center mb-4">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="telefone">
                                <label for="telefone">Telefone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="documento" name="documento" placeholder="documento">
                                <label for="documento">Documento (RG ou CPF)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="cep">
                                <label for="cep">CEP</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="rua" name="rua" placeholder="rua">
                                <label for="rua">Rua</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="municipio" name="municipio" placeholder="municipio">
                                <label for="municipio">Municipio</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="complemento">
                                <label for="complemento">Complemento</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="uf" name="uf" placeholder="uf">
                                <label for="uf">UF</label>
                            </div>
                        </div>
                    </div>
                
                <div class="col-12 m-0">
                    <button type="submit" class="btn btn-primary">
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection