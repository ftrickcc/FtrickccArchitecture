<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Traits\Properties;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Support\Attributes\Icon;
use MoonShine\Support\Enums\PageType;
use MoonShine\Support\ListOf;
use Sweet1s\MoonshineRBAC\Traits\WithPermissionsFormComponent;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

#[Icon('s.rectangle-group')]
/**
 * @extends ModelResource<Role>
 */
class RoleResource extends ModelResource
{
    use WithRolePermissions;
    use WithPermissionsFormComponent;
    use Properties;

    protected string $model = Role::class;

    
    public function __construct()
    {
        $this->title(__('moonshine::ui.resource.role'))
            ->itemsPerPage(10)
            ->redirectAfterSave(PageType::INDEX)
            ->column('name')
            ->Async(false)
            ->allInModal();
    }

    
    protected function activeActions(): ListOf
    {
        return parent::activeActions()->except(Action::VIEW);
    }
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make(__('moonshine::ui.resource.role_name'), 'name'),
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
                Text::make(__('moonshine::ui.resource.role_name'), 'name')
                    ->required(),
            ]),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return $this->indexFields();
    }

   
    // /**
    //  * @return array{name: array|string}
    //  */
    protected function rules($item): array
    {
        return [
            'name' => ['required', 'min:5'],
        ];
    }

    
    protected function search(): array
    {
        return [
            'id',
            'name',
        ];
    }

}
