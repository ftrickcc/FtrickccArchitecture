<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\File;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\ID;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Select;

class FileFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Proyecto', 'project', 'name')
                ->searchable()
                ->required(),

            Text::make('Código', 'code')
                ->required(),

            Text::make('Nombre', 'name')
                ->required(),

            Date::make('Fecha de creación', 'creation_date')
                ->format('Y-m-d')
                ->required(),

            Select::make('Estado', 'status')
                ->options([
                    'En elaboración' => 'En elaboración',
                    'Revisión' => 'Revisión',
                    'Aprobado' => 'Aprobado',
                    'Archivado' => 'Archivado',
                ])
                ->required(),
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
