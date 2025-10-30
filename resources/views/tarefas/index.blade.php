@extends('layouts.app')

@section('title', 'Minhas Tarefas')

@section('content')
<div class="page-header">
    <h2 class="page-title">Minhas Tarefas</h2>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary">+ Nova Tarefa</a>
</div>

<div class="filter-section">
    <form method="GET" class="filter-form">
        <label for="status" class="filter-label">Filtrar:</label>
        <select name="status" id="status" class="form-control" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach($statusOptions as $statusOption)
                <option value="{{ $statusOption->value }}" {{ request('status') == $statusOption->value ? 'selected' : '' }}>
                    {{ $statusOption->label() }}
                </option>
            @endforeach
        </select>
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

            <p class="tarefa-descricao">
                @if($tarefa->descricao)
                    {{ Str::limit($tarefa->descricao, 120) }}
                @else
                    <span class="text-muted">Sem descrição</span>
                @endif
            </p>

            <div class="tarefa-footer">
                <small class="tarefa-data">
                    Criada em {{ $tarefa->created_at->format('d/m/Y') }} às {{ $tarefa->created_at->format('H:i') }}
                </small>

                <div class="tarefa-actions">
                    <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" style="display: inline;" onsubmit="return confirm('Deseja excluir esta tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">�</div>
            <h3>Nenhuma tarefa encontrada</h3>
            <p>Crie sua primeira tarefa para começar!</p>
            <a href="{{ route('tarefas.create') }}" class="btn btn-primary">+ Criar Tarefa</a>
        </div>
    @endforelse
</div>

@if($tarefas->hasPages())
    <div style="margin-top: 2rem;">
        {{ $tarefas->links() }}
    </div>
@endif
@endsection
