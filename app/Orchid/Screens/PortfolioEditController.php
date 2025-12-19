<?php

namespace App\Orchid\Screens;

use App\Models\Place;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PortfolioEditController extends Screen
{
    public $portfolio;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Portfolio $portfolio): array
    {
        return [
            'portfolio' => $portfolio
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->portfolio->exists ? 'Редактировать' : 'Создать';
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
            Button::make('удалить')
                ->icon('pencil')
                ->method('remove'),

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
                Input::make('portfolio.title')
                    ->title('Навание')
                    ->placeholder('Введите название')
                    ->required(),
                Input::make('portfolio.slug')
                    ->title('url')
                    ->placeholder('url')
                    ->required(),
                Select::make('portfolio.place_id')
                    ->title('Площадка')
                    ->fromModel(Place::class, 'name')
                    ->required(),
                Upload::make('portfolio.attachments')
                    ->title('фото')
            ])
        ];
    }
    public function save(Portfolio $portfolio, Request $request)
    {
        $portfolio->fill($request->get('portfolio'))->save();

        $portfolio->attachment()->syncWithoutDetaching(
            $request->input('portfolio.attachments', [])
        );
        Alert::info('Сохранено');
        return redirect()->route('platform.portfolio');
    }
    public function remove(Portfolio $portfolio)
    {
        $portfolio->delete();
        Alert::info('Удалено');
        return redirect()->route('platform.portfolio');
    }
}
