<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Advance;
use App\MoonShine\Pages\Advance\AdvanceIndexPage;
use App\MoonShine\Pages\Advance\AdvanceFormPage;
use App\MoonShine\Pages\Advance\AdvanceDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Advance, AdvanceIndexPage, AdvanceFormPage, AdvanceDetailPage>
 */
class AdvanceResource extends ModelResource
{

    protected string $model = Advance::class;

    protected string $title = 'Avances';

    protected bool $createModel = true;

    protected bool $editModel = true;

    protected bool $showModel = true;

    protected bool $deleteModel = true;

    protected bool $exportModel = true;

    protected bool $importModel = true;
    
    
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            AdvanceIndexPage::class,
            AdvanceFormPage::class,
            AdvanceDetailPage::class,
        ];
    }

    /**
     * @param Advance $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
