<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gerenciador de Tarefas')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="{{ route('tarefas.index') }}">📝 Gerenciador de Tarefas</a>
            </div>
            <div class="nav-menu">
                <a href="{{ route('tarefas.index') }}" class="nav-link">Minhas Tarefas</a>
                @auth
                    <span class="nav-user">👤 {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link btn-link">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Registrar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container">
        <x-alert />

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Gerenciador de Tarefas. Desenvolvido com Laravel.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
