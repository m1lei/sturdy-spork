<?php

namespace App\Orchid\Screens;

use App\Models\Page;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PageEditController extends Screen
{
    public $page;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Page $page): iterable
    {
        return [
            'page' => $page
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->page->exists ? 'Редактировать страницу' :'Создать страницу' ;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [Button::make('Сохранить')
            ->icon('pencil')
            ->method('save'),
            Button::make('Удалить')
                ->icon('pencil')
                ->method('remove')
                ->canSee($this->page->exists),];
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
                Input::make('page.title')
                    ->title('Название')
                    ->placeholder('Напишите название')
                    ->required(),
                Input::make('page.slug')
                    ->title('url')
                    ->placeholder('Напишите url')
                    ->required(),
                SimpleMDE::make('page.content')
                    ->title('Контент страницы')
                    ->placeholder('что должно быть на странице?')
                    ->required()
            ])
        ];
    }
    public function save(Page $page, Request $request)
    {
        $page->fill($request->get('page'))->save();

        Alert::info('YEs');
        return redirect()->route('platform.page');
    }
    public function remove(Page $page)
    {
        $page->delete();
        Alert::info('Удалено');
        return redirect()->route('platform.page');
    }
}
