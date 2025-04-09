<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\UserResource;
use App\Services\ThemeApplier;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use Sweet1s\MoonshineRBAC\Resource\PermissionResource;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\ProjectResource;
use App\MoonShine\Resources\PhaseResource;
use App\MoonShine\Resources\TeamResource;
use App\MoonShine\Resources\AdvanceResource;
use App\MoonShine\Resources\FileResource;
use App\MoonShine\Resources\SectionResource;
use App\MoonShine\Resources\DocumentResource;
use App\MoonShine\Resources\VersionResource;
use App\MoonShine\Resources\BudgetResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(
        CoreContract $core,
        ConfiguratorContract $config,
        ColorManagerContract $colorManager
    ): void {
        // $config->authEnable();

        (new ThemeApplier($colorManager))->theme2();

        $core
            ->resources([
                UserResource::class,
                RoleResource::class,
                PermissionResource::class,
                ProjectResource::class,
                PhaseResource::class,
                TeamResource::class,
                AdvanceResource::class,
                FileResource::class,
                SectionResource::class,
                DocumentResource::class,
                VersionResource::class,
                BudgetResource::class,
            ])
            ->pages([
                ...$config->getPages(),
            ])
        ;
    }
}
