<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\MoonShine\Pages\File\FileIndexPage;
use App\MoonShine\Pages\File\FileFormPage;
use App\MoonShine\Pages\File\FileDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<File, FileIndexPage, FileFormPage, FileDetailPage>
 */
class FileResource extends ModelResource
{
    protected string $model = File::class;

    protected string $title = 'Files';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            FileIndexPage::class,
            FileFormPage::class,
            FileDetailPage::class,
        ];
    }

    /**
     * @param File $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
