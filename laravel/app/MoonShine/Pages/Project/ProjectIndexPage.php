<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Project;

use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Enum;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\UserResource; // Importa el UserResource
use MoonShine\UI\Fields\Select;


class ProjectIndexPage extends IndexPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('Código', 'code')
                ->placeholder('Ingrese el código del proyecto')
                ->sortable(),

            Text::make('Nombre', 'name')
                ->sortable(),

            Date::make('Fecha de inicio', 'start_date')
                ->format('Y-m-d'),

            BelongsTo::make(
                    label: 'Responsable', // Etiqueta del campo
                    relationName: 'responsible', // Nombre de la relación en el modelo Project
                    resource: UserResource::class // Clase del Resource de usuarios
                )->searchable(),
            
            Select::make('Estado', 'status')
                ->options([
                    'planning' => 'Planificación',
                    'in_progress' => 'En progreso',
                    'paused' => 'Pausado',
                    'completed' => 'Completado',
                    'canceled' => 'Cancelado'
                ]),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
