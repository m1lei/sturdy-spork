<?php

namespace App\Orchid\Screens;

use App\Models\Page;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PageListController extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'pages' => Page::latest()->paginate(10)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Страницы';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('создать')
                ->icon('pencil')
                ->route('platform.page.create')
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
            Layout::table('pages',[
                TD::make('id','ID')->sort(),
                TD::make('title', 'название'),
                TD::make('slug', 'url'),
                TD::make('content', 'контент'),
                TD::make('actions', 'действия')->render(function (Page $page){
                        return Link::make('Редактировать')->icon('pencil')
                                ->route('platform.page.edit', $page);
                })
            ])
        ];
    }
}
