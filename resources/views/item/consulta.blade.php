@extends('basico')

@section('title', 'Clientes')

@section('content')
    
    <div class="col mx-auto">
        <h1 class="mt-5">CONSULTAR ITEM</h1>
        <div class="col-10 mx-auto">
            @component('cliente._components.subMenu')
            
            @endcomponent
            <form action="{{ route('item.consultar') }}" class="row g-3 needs-validation" method="POST" novalidate>
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
                                <input type="tel" class="form-control" id="preco" name="preco" placeholder="preco">
                                <label for="preco">Preco</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo">
                                <label for="codigo">Código</label>
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