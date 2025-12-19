<?php

namespace App\Orchid\Screens;

use App\Models\Article;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ArticleListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'articles' => Article::all(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Создать';
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
                ->route('platform.article.create')
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
            Layout::table('articles', [
                TD::make('id', 'ID')->sort(),
                TD::make('title', 'Название'),
                TD::make('slug', 'url'),
                TD::make('content', 'Контент'),
                TD::make('actions', 'Действия')->render(function (Article $article){
                    return Link::make('Редактировать')->icon('pencil')
                            ->route('platform.article.edit',$article);
                })
            ])
        ];
    }
}
