<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Budget;
use App\MoonShine\Pages\Budget\BudgetIndexPage;
use App\MoonShine\Pages\Budget\BudgetFormPage;
use App\MoonShine\Pages\Budget\BudgetDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Pages\Page;

/**
 * @extends ModelResource<Budget, BudgetIndexPage, BudgetFormPage, BudgetDetailPage>
 */
class BudgetResource extends ModelResource
{
    protected string $model = Budget::class;

    protected string $title = 'Budgets';
    
    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            BudgetIndexPage::class,
            BudgetFormPage::class,
            BudgetDetailPage::class,
        ];
    }

    /**
     * @param Budget $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
