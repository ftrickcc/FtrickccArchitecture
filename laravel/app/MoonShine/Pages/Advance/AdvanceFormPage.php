<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Advance;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\ID;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Textarea;

class AdvanceFormPage extends FormPage
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

            Number::make('Progreso Global', 'overall_progress')
                ->required(),

            Textarea::make('Hitos Clave', 'milestones'),

            BelongsTo::make('Actualizado Por', 'updated_by', 'name')
                ->searchable()
                ->required(),

            // $table->id();
            // $table->foreignId('project_id')->constrained();
            // $table->unsignedInteger('overall_progress'); // % global de avance
            // $table->text('milestones'); // Hitos clave (ej: "Cimentación completada al 50%")
            // $table->foreignId('updated_by')->constrained('users'); // Quién registró el avance
            // $table->timestamps();
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
