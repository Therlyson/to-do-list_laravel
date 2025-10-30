<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autenticação') - Gerenciador de Tarefas</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1><a href="/">📋 Tarefas</a></h1>
        </div>
    </nav>

    <main class="container">
        <div style="max-width: 450px; margin: 3rem auto;">
            <div class="card">
                <div class="card-body">
                    <x-alert />
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Gerenciador de Tarefas - Laravel</p>
    </footer>
</body>
</html>
