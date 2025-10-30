<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gerenciador de Tarefas')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1><a href="{{ route('tarefas.index') }}">Gerenciador de Tarefas</a></h1>
            
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span style="color: white;">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        <x-alert />

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
