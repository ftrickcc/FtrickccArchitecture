<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Phase;

use MoonShine\Laravel\Resources\ModelResource;

use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Date;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Range;
use MoonShine\UI\Fields\Number;
use MoonShine\Actions\FiltersAction;
use MoonShine\Actions\SoftDeleteActions;

/**
 * @extends ModelResource<Phase>
 */
class PhaseResource extends ModelResource
{
    protected string $model = Phase::class;

    protected string $title = 'Phases';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            BelongsTo::make('Proyecto', 'project', 'name')
                ->searchable()
                ->required(),

            Text::make('Fase', 'name')
                ->placeholder('Ingrese en que fase del proyecto se encuentra')
                ->required(),

            Textarea::make('Descripción', 'description'),

            Date::make('Fecha de inicio', 'start_date')
                ->format('Y-m-d')
                ->required(),

            Date::make('Fecha de fin', 'end_date')
                ->format('Y-m-d')
                ->required(),

            Number::make('Progreso', 'progress')
                ->buttons()
                ->min(0)
                ->max(100)
                ->step(10)
                ->required()
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make()->sortable(),
            
                BelongsTo::make('Proyecto', 'project', 'name')
                    ->searchable()
                    ->required(),
    
                Text::make('Nombre', 'name')
                    ->placeholder('Ingrese en que fase del proyecto se encuentra')
                    ->required(),
    
                Textarea::make('Descripción', 'description')
                    ->placeholder('Ingrese una descripción para la fase (opcional)'),
    
                Date::make('Fecha de inicio', 'start_date')
                    ->format('Y-m-d')
                    ->required(),
    
                Date::make('Fecha de fin', 'end_date')
                    ->format('Y-m-d')
                    ->required(),
    
                Number::make('Progreso', 'progress')
                    ->buttons()
                    ->min(0)
                    ->max(100)
                    ->step(10)
                    ->required()
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            BelongsTo::make('Proyecto', 'project', 'name')
                ->searchable()
                ->required(),

            Text::make('Nombre', 'name')
                ->required(),

            Textarea::make('Descripción', 'description'),

            Date::make('Fecha de inicio', 'start_date')
                ->format('Y-m-d')
                ->required(),

            Date::make('Fecha de fin', 'end_date')
                ->format('Y-m-d')
                ->required(),

            Number::make('Progreso', 'progress')
                ->buttons()
                ->min(0)
                ->max(100)
                ->step(10)
                ->required()
        ];
    }

    protected function rules(mixed $item): array
    {
        return [
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'progress' => 'required|numeric|min:0|max:100',
        ];
    }

}
