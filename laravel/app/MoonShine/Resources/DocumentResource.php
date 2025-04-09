<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\MoonShine\Pages\Document\DocumentIndexPage;
use App\MoonShine\Pages\Document\DocumentFormPage;
use App\MoonShine\Pages\Document\DocumentDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Document, DocumentIndexPage, DocumentFormPage, DocumentDetailPage>
 */
class DocumentResource extends ModelResource
{
    protected string $model = Document::class;

    protected string $title = 'Documents';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            DocumentIndexPage::class,
            DocumentFormPage::class,
            DocumentDetailPage::class,
        ];
    }

    /**
     * @param Document $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
