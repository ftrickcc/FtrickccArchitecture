<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Select;
/**
 * @extends ModelResource<Team>
 */
class TeamResource extends ModelResource
{
    protected string $model = Team::class;

    protected string $title = 'Teams';
    
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
            BelongsTo::make('Usuario', 'user', 'name')
                ->searchable()
                ->required(),
            Select::make('Rol', 'role')
                ->options([
                    'manager' => 'Manager',
                    'engineer' => 'Engineer',
                    'architect' => 'Architect',
                    'consultant' => 'Consultant'
                ])
                ->required(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
                Box::make([
                    ID::make(),
                    BelongsTo::make('Proyecto', 'project', 'name')
                        ->searchable()
                        ->required(),
                    BelongsTo::make('Usuario', 'user', 'name')
                        ->searchable()
                        ->required(),
                    Select::make('Rol', 'role')
                        ->options([
                            'manager' => 'Manager',
                            'engineer' => 'Engineer',
                            'architect' => 'Architect',
                            'consultant' => 'Consultant'
                        ])
                        ->required(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Nombre', 'name'),
            Text::make('Descripción', 'description'),
            BelongsTo::make('Proyecto', 'project', 'name')
                ->searchable()
                ->required(),
            BelongsTo::make('Usuario', 'user', 'name')
                ->searchable()
                ->required(),
            Select::make('Rol', 'role')
                ->options([
                    'manager' => 'Manager',
                    'engineer' => 'Engineer',
                    'architect' => 'Architect',
                    'consultant' => 'Consultant'
                ])
                ->required(),
        ];
    }

    /**
     * @param Team $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
