<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use Illuminate\Http\Request;
use Orchid\Alert\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class CategoryEditController extends Screen
{
    public $category;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Category $category): iterable
    {
        return [
            'category' => $category
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'редактировать' : 'Создать';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('сохранить')
                ->icon('pencil')
                ->method('save'),
            Button::make('удалить')
                ->icon('pencil')
                ->method('remove')
                ->canSee($this->category->exists)
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
                Input::make('category.name')
                    ->title('название')
                    ->placeholder('Напишите название')
                    ->required(),
                Input::make('category.slug')
                    ->title('url')
                    ->placeholder('Напишите url')
                    ->required(),
            ])
        ];
    }

    public function save(Category $category, Request $request)
    {
        $category->fill($request->get('category'))->save();

        \Orchid\Support\Facades\Alert::info('Успех');
        return redirect()->route('platform.category');
    }
    public function remove(Category $category)
    {
        $category->delete();
        \Orchid\Support\Facades\Alert::info('delete category');
        return redirect()->route('platform.category');
    }
}
