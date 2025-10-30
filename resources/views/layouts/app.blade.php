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
            <h1><a href="{{ route('tarefas.index') }}">Tarefas</a></h1>
        </div>
    </nav>

    <main class="container">
        <x-alert />

        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Gerenciador de Tarefas - Laravel</p>
    </footer>

    @stack('scripts')
</body>
</html>
