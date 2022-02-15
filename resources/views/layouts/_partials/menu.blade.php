<nav>
    <ul>
        <li><a href="{{ route('principal.index') }}">Principal</a></li>
        <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
        <li><a href="{{ route('loja.index') }}">Lojas</a></li>
        @if (Auth::check())
        <li><a href="{{ route('principal.logout') }}">Sair</a></li>
        
        @else
            <li><a href="{{ route('principal.login') }}">Entrar</a></li>
            <li><a href="{{ route('principal.register') }}">Registrar</a></li>
        @endif
    </ul>
</nav>