<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Version;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use App\MoonShine\Resources\FileResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;


/**
 * @extends ModelResource<Version>
 */
class VersionResource extends ModelResource
{
    protected string $model = Version::class;

    protected string $title = 'Versions';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(
                label: 'Documento',
                relationName: 'document',
                resource: FileResource::class
            )
            ->searchable()
            ->required(),

            Text::make('Número de versión', 'version_number')
                ->required(),       

            Text::make('Cambios', 'changes')
                ->required(),

            Text::make('Ruta del archivo', 'file_path')
                ->required(),

             BelongsTo::make(
                    label: 'Usuario',
                    relationName: 'modifiedBy', // Cambiado de 'modified_by' a 'modifiedBy'
                    resource: UserResource::class
                )
                ->searchable()
                ->required(),

            Date::make('Fecha de creación', 'version_date')
                ->format('Y-m-d')
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

                BelongsTo::make(
                    label: 'Documento',
                    relationName: 'document',
                    resource: FileResource::class
                )
                ->searchable()
                ->required(),
    
                Text::make('Número de versión', 'version_number')
                    ->required(),       
    
                Text::make('Cambios', 'changes')
                    ->required(),
    
                Text::make('Ruta del archivo', 'file_path')
                    ->required(),
    
                BelongsTo::make(
                        label: 'Usuario',
                        relationName: 'modifiedBy', // Cambiado de 'modified_by' a 'modifiedBy'
                        resource: UserResource::class
                    )
                    ->searchable()
                    ->required(),
    
                Date::make('Fecha de creación', 'version_date')
                    ->format('Y-m-d')
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

            BelongsTo::make(
                label: 'Documento',
                relationName: 'document',
                resource: FileResource::class
            )
            ->searchable()
            ->required(),

            Text::make('Número de versión', 'version_number')
                ->required(),       

            Text::make('Cambios', 'changes')
                ->required(),

            Text::make('Ruta del archivo', 'file_path')
                ->required(),

             BelongsTo::make(
                    label: 'Usuario',
                    relationName: 'modifiedBy', // Cambiado de 'modified_by' a 'modifiedBy'
                    resource: UserResource::class
                )
                ->searchable()
                ->required(),

            Date::make('Fecha de creación', 'version_date')
                ->format('Y-m-d')
                ->required(),
        ];
    }

    /**
     * @param Version $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
