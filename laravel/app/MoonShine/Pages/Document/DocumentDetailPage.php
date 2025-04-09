<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Document;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use Throwable;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\Preview;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use App\MoonShine\Resources\FileResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\UI\Fields\ID;
use App\MoonShine\Resources\UserResource;
class DocumentDetailPage extends DetailPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [

                ID::make()->sortable(),
                BelongsTo::make(
                    label: 'Archivo Técnico', 
                    relationName: 'technicalFile', // Nombre exacto de la relación en el modelo
                    resource: FileResource::class // Especifica el Resource
                )
                ->searchable()
                ->required(),
    
                BelongsTo::make('Parte', 'section', 'name')
                    ->searchable()
                    ->required(),
    
                Text::make('Título', 'title')
                    ->required(),
    
                Select::make('Tipo de archivo', 'file_type')
                    ->options([
                        'word' => 'Word',
                        'excel' => 'Excel',
                        'pdf' => 'PDF',
                        'mpp' => 'MPP',
                        'dwg' => 'DWG',
                        'otros' => 'Otros',
                    ])
                    ->required(),
    
                File::make('Ruta del archivo', 'file_path')
                    ->disk('public'),
    
                Preview::make('Revisado', 'is_reviewed')
                    ->boolean(hideTrue: false, hideFalse: false),
    
    
                BelongsTo::make(
                        label: 'Revisado por', 
                        relationName: 'reviewedBy',
                        resource: UserResource::class
                    )
                    ->searchable()
                    ->required(),
                Date::make('Fecha de revisión', 'reviewed_at')
                    ->format('Y-m-d')
                    ->required(),
    
                Date::make('Fecha de creación', 'created_at')
                    ->format('Y-m-d')
                    ->required(),   
    
                Date::make('Fecha de actualización', 'updated_at')
                    ->format('Y-m-d')
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
