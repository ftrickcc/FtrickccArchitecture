<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\MoonShine\Pages\Project\ProjectIndexPage;
use App\MoonShine\Pages\Project\ProjectFormPage;
use App\MoonShine\Pages\Project\ProjectDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Project, ProjectIndexPage, ProjectFormPage, ProjectDetailPage>
 */
class ProjectResource extends ModelResource
{
    protected string $model = Project::class;

    protected string $title = 'Projects';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            ProjectIndexPage::class,
            ProjectFormPage::class,
            ProjectDetailPage::class,
        ];
    }

    /**
     * @param Project $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
