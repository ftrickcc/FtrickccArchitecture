<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Project;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\Pages\Page;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Select;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use App\MoonShine\Resources\UserResource; // Importa el UserResource
use MoonShine\UI\Fields\Enum;

class ProjectFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),

            Text::make('Código', 'code')
                ->placeholder('Ingrese el código del proyecto')
                ->required(),

            Text::make('Nombre', 'name')
                ->placeholder('Ingrese el nombre del proyecto')
                ->required(),

            Textarea::make('Descripción', 'description')
                ->placeholder('Ingrese una descripción para el proyecto'),

            Text::make('Ubicación', 'location')
                ->placeholder('Ingrese la ubicación del proyecto'),

            Date::make('Fecha de inicio', 'start_date')
                ->format('Y-m-d')
                ->required(),

            Date::make('Fecha de fin', 'end_date')
                ->format('Y-m-d')
                ->required(),

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
                )->searchable(),
        ];
    }

    public function rules(\Illuminate\Database\Eloquent\Model $item): array
    {
        return [
            'code' => 'required|unique:projects,code,' . $item->id,
            'name' => 'required|string|max:255',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:planning,in_progress,paused,completed,canceled',
            'responsible_id' => 'required|exists:users,id',
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
