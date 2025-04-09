<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Traits\Properties;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Validation\Rule;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Support\Attributes\Icon;
use MoonShine\UI\Components\Badge;
use MoonShine\UI\Components\Collapse;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\PasswordRepeat;
use Sweet1s\MoonshineRBAC\Traits\WithRoleFormComponent;
use Sweet1s\MoonshineRBAC\Traits\WithRolePermissions;

#[Icon('s.user-group')]
/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    use WithRolePermissions;
    use WithRoleFormComponent;
    use Properties;

    protected string $model = User::class;

    public function __construct()
    {
        $this->title(__('moonshine::ui.resource.admins_title'))
            ->columnSelection(true)
            ->with(['roles'])
            ->column('name')
            ->isAsync(false);
    }


    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        
        return [
            ID::make()->sortable(),

            Image::make(__('moonshine::ui.resource.avatar'), 'avatar')
                ->modifyRawValue(fn(?string $raw): string => $raw ?? ''),

            Text::make(__('moonshine::ui.resource.name'), 'name'),

            BelongsToMany::make(__('moonshine::ui.resource.role'), 'roles')
            ->inLine(
                separator: ' ',
                badge: fn($model, $value) => Badge::make((string) $value, 'primary'),
            ),

            Email::make(__('moonshine::ui.resource.email'), 'email'),

            Date::make(__('moonshine::ui.resource.created_at'), 'created_at')
                ->format("d/M/Y")
                ->sortable(),
        ];
    }

    protected function formFields(): iterable
    {
        return [
            Box::make([
                Tabs::make([
                    Tab::make(__('moonshine::ui.resource.main_information'), [
                        ID::make()->sortable(),

                        Flex::make([
                            Text::make(__('moonshine::ui.resource.name'), 'name')
                                ->required(),

                            Email::make(__('moonshine::ui.resource.email'), 'email')
                                ->required(),
                        ]),

                        Image::make(__('moonshine::ui.resource.avatar'), 'avatar')
                            ->disk('public')
                            ->dir('moonshine_users')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),

                        Date::make(__('moonshine::ui.resource.created_at'), 'created_at')
                            ->format("d.m.Y")
                            ->default(now()->toDateTimeString()),
                    ])->icon('user-circle'),

                    Tab::make(__('moonshine::ui.resource.password'), [
                        Collapse::make(__('moonshine::ui.resource.change_password'), [
                            Password::make(__('moonshine::ui.resource.password'), 'password')
                                ->customAttributes(['autocomplete' => 'new-password'])
                                ->eye(),

                            PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                                ->customAttributes(['autocomplete' => 'confirm-password'])
                                ->eye(),
                        ])->icon('lock-closed'),
                    ])->icon('lock-closed'),
                ]),
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

    /**
     * @return array{name: array|string, moonshine_user_role_id: array|string, email: array|string, password: array|string}
     */
    protected function rules($item): array
    {
        return [
            'name' => 'required',
            'email' => [
                'sometimes',
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignoreModel($item),
            ],
            'password' => $item->exists
                ? 'sometimes|nullable|min:6|required_with:password_repeat|same:password_repeat'
                : 'required|min:6|required_with:password_repeat|same:password_repeat',
        ];
    }


    protected function search(): array
    {
        return [
            'id',
            'name',
            'email',
        ];
    }

    protected function filters(): iterable
    {
        return [
            BelongsToMany::make(__('moonshine::ui.resource.role'), 'roles')
        ];
    }

}
