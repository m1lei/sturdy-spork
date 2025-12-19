<?php

namespace App\Orchid\Screens;

use App\Models\City;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class CityEditController extends Screen
{
    public $city;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(City $city): iterable
    {
        return [
            'city' => $city
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->city->exists ? 'редактировать' : 'Создать';
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
                ->canSee($this->city->exists)
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
                Input::make('city.name')
                    ->title('Название')
                    ->placeholder('Напишите название')
                    ->required(),
                Input::make('city.slug')
                    ->title('url')
                    ->placeholder('url')
                    ->required()
            ])
        ];
    }

    public function save(City $city, Request $request)
    {
        $city->fill($request->get('city'))->save();

        Alert::info('YeS');
        return redirect()->route('platform.city');
    }

    public function remove(City $city)
    {
        $city->delete();
        Alert::info('delete City');
        return redirect()->route('platform.city');
    }
}
