<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Project;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Date;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\UserResource; // Importa el UserResource
use MoonShine\UI\Fields\Select;

class ProjectDetailPage extends DetailPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('Código', 'code'),
            Text::make('Nombre', 'name'),
            Textarea::make('Descripción', 'description'),
            Text::make('Ubicación', 'location'),
            Date::make('Fecha de inicio', 'start_date'),
            Date::make('Fecha de fin', 'end_date'),
            Select::make('Estado', 'status')
                ->options([
                    'planning' => 'Planificación',
                    'in_progress' => 'En progreso',
                    'paused' => 'Pausado',
                    'completed' => 'Completado',
                    'canceled' => 'Cancelado'
                ]),
            BelongsTo::make(
                label: 'Responsable', // Etiqueta del campo
                relationName: 'responsible', // Nombre de la relación en el modelo Project
                resource: UserResource::class // Clase del Resource de usuarios
            )        
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
