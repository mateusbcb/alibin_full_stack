<ul class="nav justify-content-end border-bottom">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.create') }}">Novo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.consult') }}">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url()->previous() }}">Voltar</a>
    </li>
</ul>