@extends('layouts.app')

@section('title', 'Minhas Tarefas')

@section('content')
<div class="page-header">
    <h1 class="page-title">📋 Minhas Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
        ➕ Nova Tarefa
    </a>
</div>

<div class="filter-section">
    <form method="GET" action="{{ route('tarefas.index') }}" class="filter-form">
        <label for="status" class="filter-label">Filtrar por status:</label>
        <select name="status" id="status" class="form-control filter-select" onchange="this.form.submit()">
            <option value="">🔍 Todos os status</option>
            @foreach($statusOptions as $statusOption)
                <option 
                    value="{{ $statusOption->value }}"
                    {{ request('status') == $statusOption->value ? 'selected' : '' }}
                >
                    {{ $statusOption->label() }}
                </option>
            @endforeach
        </select>
        <noscript>
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </noscript>
    </form>
</div>

<div class="tarefas-grid">
    @forelse($tarefas as $tarefa)
        <div class="tarefa-card">
            <div class="tarefa-header">
                <h3 class="tarefa-titulo">{{ $tarefa->titulo }}</h3>
                <span class="badge badge-{{ $tarefa->status->badge() }}">
                    {{ $tarefa->status->label() }}
                </span>
            </div>

            @if($tarefa->descricao)
                <p class="tarefa-descricao">
                    {{ Str::limit($tarefa->descricao, 150) }}
                </p>
            @else
                <p class="tarefa-descricao text-muted">
                    <em>Sem descrição</em>
                </p>
            @endif

            <div class="tarefa-footer">
                <small class="tarefa-data">
                    📅 Criada em {{ $tarefa->created_at->format('d/m/Y') }} às {{ $tarefa->created_at->format('H:i') }}
                </small>

                <div class="tarefa-actions">
                    <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-sm btn-secondary">
                        ✏️ Editar
                    </a>
                    <form 
                        action="{{ route('tarefas.destroy', $tarefa) }}" 
                        method="POST" 
                        style="display: inline;"
                        onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            🗑️ Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">📭</div>
            <h3>Nenhuma tarefa encontrada</h3>
            <p>Comece criando sua primeira tarefa!</p>
            <a href="{{ route('tarefas.create') }}" class="btn btn-primary">
                ➕ Criar Primeira Tarefa
            </a>
        </div>
    @endforelse
</div>

@if($tarefas->hasPages())
    <div class="pagination-wrapper">
        {{ $tarefas->links() }}
    </div>
@endif
@endsection
