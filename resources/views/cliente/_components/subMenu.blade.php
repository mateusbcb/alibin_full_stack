<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.create') }}">Novo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.consulta') }}">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.index') }}">Voltar</a>
        {{--  <a class="nav-link" href="{{ url()->previous() }}">Voltar</a>  --}}
    </li>
</ul>