<?php

namespace App\Http\Controllers;

use App\Enums\StatusTarefa;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarefa::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if (auth()->check()) {
            $query->where('user_id', auth()->id());
        }

        $tarefas = $query->latest()->paginate(10);

        return view('tarefas.index', [
            'tarefas' => $tarefas,
            'statusOptions' => StatusTarefa::cases()
        ]);
    }

    public function create()
    {
        return view('tarefas.create', [
            'statusOptions' => StatusTarefa::cases()
        ]);
    }

    public function store(StoreTarefaRequest $request)
    {
        $data = $request->validated();

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        Tarefa::create($data);

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(Tarefa $tarefa)
    {
        return redirect()->route('tarefas.index');
    }

    public function edit(Tarefa $tarefa)
    {
        if (auth()->check() && $tarefa->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para editar esta tarefa.');
        }

        return view('tarefas.edit', [
            'tarefa' => $tarefa,
            'statusOptions' => StatusTarefa::cases()
        ]);
    }

    public function update(UpdateTarefaRequest $request, Tarefa $tarefa)
    {
        if (auth()->check() && $tarefa->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para atualizar esta tarefa.');
        }

        $tarefa->update($request->validated());

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        if (auth()->check() && $tarefa->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para excluir esta tarefa.');
        }

        $tarefa->delete();

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}