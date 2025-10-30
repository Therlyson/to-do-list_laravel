@extends('layouts.auth')

@section('title', 'Criar Conta')

@section('content')
<h2 style="text-align: center; margin-bottom: 1.5rem; color: #2c3e50;">Criar Conta</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name" class="form-label">Nome</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            class="form-control @error('name') is-invalid @enderror" 
            value="{{ old('name') }}" 
            required 
            autofocus
        >
        @error('name')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="form-label">E-mail</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            class="form-control @error('email') is-invalid @enderror" 
            value="{{ old('email') }}" 
            required
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
        <small style="color: #7f8c8d; font-size: 0.85rem;">Mínimo de 8 caracteres</small>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
        <input 
            type="password" 
            id="password_confirmation" 
            name="password_confirmation" 
            class="form-control" 
            required
        >
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 1rem;">
        Criar Conta
    </button>

    <div style="text-align: center; margin-top: 1rem;">
        <p style="color: #666; font-size: 0.9rem;">
            Já tem uma conta? 
            <a href="{{ route('login') }}" style="color: #3498db; text-decoration: none; font-weight: 500;">
                Fazer login
            </a>
        </p>
    </div>
</form>
@endsection
