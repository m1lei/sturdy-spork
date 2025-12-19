<?php

namespace App\Orchid\Screens;

use App\Models\Article;
use App\Models\Portfolio;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PortfolioListController extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'portfolios' => Portfolio::with(['place'])->paginate(5)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Портфолио';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('добавить новое')
                ->icon('pencil')
                ->route('platform.portfolio.create')
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
            Layout::table('portfolios',[
                TD::make('id', 'ID')->sort(),
                TD::make('title', 'Название'),
                TD::make('slug', 'url'),
                TD::make('place_id', 'площадка')->render(function (Portfolio $portfolio){
                    return $portfolio->place->name;
                }),
                TD::make('actions', 'Действия')->render(function (Portfolio $portfolio){
                    return Link::make('Редактировать')->icon('pencil')
                            ->route('platform.portfolio.edit',$portfolio);
                })
            ])
        ];
    }
}
