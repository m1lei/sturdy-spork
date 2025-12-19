<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Get Started')
                ->icon('bs.book')
                ->title('Navigation')
                ->route(config('platform.index')),

            Menu::make('Добавить место')
                ->icon('bs.plus-circle')
                ->route('platform.places.create'),

            Menu::make('Все Места')
                ->icon('bs.list')
                ->route('platform.places'),

            Menu::make('Города')
                ->icon('bs.list')
                ->route('platform.city'),
            Menu::make('Категория')
                ->icon('bs.list')
                ->route('platform.category'),
            Menu::make('Статьи')
                ->icon('bc.list')
                ->route('platform.article'),
            Menu::make('Портфолио')
                ->icon('bs.list')
                ->route('platform.portfolio')
        ];

    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
