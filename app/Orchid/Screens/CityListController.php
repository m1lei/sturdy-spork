<?php

namespace App\Orchid\Screens;

use App\Models\City;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class CityListController extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'cities' => City::latest()->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Города';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать')
                ->icon('pencil')
                ->route('platform.city.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('cities', [
                TD::make('name','название'),
                TD::make('slug','url'),
                TD::make('actions', 'Действия')->render(function (City $city){
                    return Link::make('редактировать')->icon('pencil')
                            ->route('platform.city.edit',$city);
                })
            ])
        ];
    }
}
