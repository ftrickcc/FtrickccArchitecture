<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Resources\RoleResource;
use App\MoonShine\Resources\UserResource;
use App\Services\ThemeApplier;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\{
    Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When
};
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


final class MoonShineLayout extends AppLayout
{

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function getFaviconComponent(): Favicon
    {
        return parent::getFaviconComponent()->customAssets([
            'apple-touch' => '/img/logo.png',
            '32' => '/img/logo.png',
            '16' => '/img/logo.png',
            'safari-pinned-tab' => '/img/logo.png',
            'web-manifest' => '/img/logo.png',
        ]);
    }

    protected function getFooterComponent(): Footer
    {
        return Footer::make()
            ->copyright(fn(): string => '© F\'trick ' . date('Y'));
    }
    
    protected function menu(): array
    {
        return [
            MenuGroup::make('system', [
                MenuItem::make('admins_title',  UserResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('role',  RoleResource::class)
                    ->translatable('moonshine::ui.resource'),

                MenuItem::make('permissions',  PermissionResource::class)
                    ->translatable('moonshine-rbac::ui')
                    ->icon('s.shield-check'),
            ])
                ->translatable('moonshine::ui.resource')
                ->icon('m.cube'),

            MenuGroup::make('Gestión de Proyectos', [
                MenuItem::make('Proyectos', ProjectResource::class),
                MenuItem::make('Fases', PhaseResource::class),
                MenuItem::make('Equipos', TeamResource::class),
                MenuItem::make('Presupuestos', BudgetResource::class),
            ])->icon('s.document-chart-bar'),
        
            MenuGroup::make('Expedientes Técnicos', [
                MenuItem::make('Expedientes', FileResource::class)->icon('folder'),
                MenuItem::make('Documentos', DocumentResource::class)->icon('s.document-duplicate'),
                MenuItem::make('Versiones', VersionResource::class)->icon('document'),
                MenuItem::make('Secciones', SectionResource::class)->icon('clipboard-document-list'),
            ])->icon('s.clipboard-document'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);
    }



    public function build(): Layout
    {
        return parent::build();
    }
}
