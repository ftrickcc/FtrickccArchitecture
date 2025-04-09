<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PLANNING = 'planning';
    case IN_PROGRESS = 'in_progress';
    case PAUSED = 'paused';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';

    public function toString(): string
    {
        return match ($this) {
            self::PLANNING => 'Planificación',
            self::IN_PROGRESS => 'En Progreso',
            self::PAUSED => 'Pausado',
            self::COMPLETED => 'Completado',
            self::CANCELED => 'Cancelado'
        };
    }

    // Color para el badge
    public function getColor(): string
    {
        return match ($this) {
            self::PLANNING => 'gray',
            self::IN_PROGRESS => 'green',
            self::PAUSED => 'orange',
            self::COMPLETED => 'blue',
            self::CANCELED => 'red'
        };
    }
}