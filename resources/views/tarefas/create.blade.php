@extends('layouts.app')

@section('title', 'Nova Tarefa')

@section('content')
<div class="page-header">
    <h1 class="page-title">📝 Nova Tarefa</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf

            @include('tarefas._form')

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    💾 Salvar Tarefa
                </button>
                <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">
                    ← Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
