<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Budget;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\ID;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Textarea;

class BudgetFormPage extends FormPage
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

            Number::make('Presupuesto Inicial', 'initial_budget')
                ->required(),

            Number::make('Presupuesto Actual', 'current_budget')
                ->required(),

            Textarea::make('Notas', 'notes'),
            
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
