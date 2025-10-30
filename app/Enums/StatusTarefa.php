<?php

namespace App\Enums;

enum StatusTarefa: string
{
    case PENDENTE = 'pendente';
    case CONCLUIDA = 'concluida';

    public function label(): string
    {
        return match($this) {
            self::PENDENTE => 'Pendente',
            self::CONCLUIDA => 'Concluída',
        };
    }

    public function badge(): string
    {
        return match($this) {
            self::PENDENTE => 'warning',
            self::CONCLUIDA => 'success',
        };
    }
}