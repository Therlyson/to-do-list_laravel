<?php

namespace App\Models;

use App\Enums\StatusTarefa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tarefas';

    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'user_id',
    ];

    protected $casts = [
        'status' => StatusTarefa::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePendentes($query)
    {
        return $query->where('status', StatusTarefa::PENDENTE);
    }

    public function scopeConcluidas($query)
    {
        return $query->where('status', StatusTarefa::CONCLUIDA);
    }
}