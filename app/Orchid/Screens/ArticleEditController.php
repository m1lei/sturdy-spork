<?php

namespace App\Orchid\Screens;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Upload;


class ArticleEditController extends Screen
{
    public $article;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Article $article): array
    {
        $article->load('attachment');

        return [
            'article' => $article
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->article->exists ? 'Редактировать' : 'Создать новую статью';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')
                ->icon('pencil')
                ->method('save'),
            Button::make('Удалить')
                ->icon('pencil')
                ->method('remove')
                ->canSee($this->article->exists)
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
            Layout::rows([
                Input::make('article.title')
                    ->title('Название')
                    ->placeholder('Название')
                    ->required(),
                Input::make('article.slug')
                    ->title('url')
                    ->placeholder('Введиде url')
                    ->required(),
                SimpleMDE::make('article.content')
                    ->title('Контент')
                    ->placeholder('контент')
                    ->required(),
                Upload::make('article.attachments')
                    ->title('фото')
            ])
        ];
    }
    public function save(Article $article, Request $request)
    {
        $article->fill($request->get('article'))->save();

        $article->attachment()->syncWithoutDetaching(
            $request->input('article.attachments', [])
        );
        Alert::info('YEs');
        return redirect()->route('platform.article');
    }

    public function remove(Article $article)
    {
        $article->delete();
        Alert::info('Удалено');
        return redirect()->route('platform.article');
    }
}
