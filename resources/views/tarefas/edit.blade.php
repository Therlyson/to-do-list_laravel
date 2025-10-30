@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<div class="page-header">
    <h1 class="page-title">✏️ Editar Tarefa</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
            @csrf
            @method('PUT')

            @include('tarefas._form')

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    💾 Atualizar Tarefa
                </button>
                <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">
                    ← Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
