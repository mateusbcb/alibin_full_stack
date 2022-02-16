<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('principal.index') }}">Alibin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('principal.index') }}">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('cliente.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('loja.index') }}">Lojas</a>
                </li>
        </ul>
        <ul class="navbar-nav">
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('principal.logout') }}">Sair</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('principal.login') }}">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('principal.register') }}">Registrar</a>
                </li>
            @endif
        </ul>

      </div>
    </div>
  </nav>