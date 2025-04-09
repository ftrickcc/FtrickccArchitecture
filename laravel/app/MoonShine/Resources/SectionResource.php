<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\Support\Enums\PageType;
/**
 * @extends ModelResource<Section>
 */
class SectionResource extends ModelResource
{

    protected string $model = Section::class;
    protected string $title = 'Secciones del expediente técnico'; 

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailInModal = true;

    protected string $column = 'name';

    protected ?PageType $redirectAfterSave = PageType :: INDEX;
    protected ?PageType $redirectAfterDelete = PageType:: INDEX;

    protected bool $isAsync = false;
    
    // protected function activeActions (): Listof
    // return parent:: activeActions ()
    // -›except(Action:: VIEW) ; 


    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Number::make('Orden', 'order'),
            Text::make('Nombre', 'name'),

            // $table->id();
            // $table->string('name'); // Ej: "Resumen Ejecutivo", "Estudios Básicos"
            // $table->integer('order')->unique(); // Orden de las partes (1 al 14)
            // $table->timestamps();
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
                Number::make('Orden', 'order'),
                Text::make('Nombre', 'name'),
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
            Number::make('Orden', 'order'),
            Text::make('Nombre', 'name'),
        ];
    }

    /**
     * @param Section $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
