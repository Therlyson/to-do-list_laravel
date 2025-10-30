@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<h2 style="text-align: center; margin-bottom: 1.5rem; color: #2c3e50;">Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label for="email" class="form-label">E-mail</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control @error('email') is-invalid @enderror" 
            value="{{ old('email') }}" 
            required 
            autofocus
        >
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Senha</label>
        <input 
            type="password" 
            id="password" 
            name="password" 
            class="form-control @error('password') is-invalid @enderror" 
            required
        >
        @error('password')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem;">
        Entrar
    </button>

    <div style="text-align: center; margin-top: 1rem;">
        <p style="color: #666; font-size: 0.9rem;">
            Não tem uma conta? 
            <a href="{{ route('register') }}" style="color: #3498db; text-decoration: none; font-weight: 500;">
                Criar conta
            </a>
        </p>
    </div>
</form>
@endsection
