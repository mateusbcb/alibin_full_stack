<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('item.create') }}">Novo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('item.consulta') }}">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('item.index') }}">Voltar</a>
        {{--  <a class="nav-link" href="{{ url()->previous() }}">Voltar</a>  --}}
    </li>
</ul>