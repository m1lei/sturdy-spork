<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Orchid\Support\Facades\Alert;
use Orchid\Attachment\Attachable;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;

class PlaceEditScreen extends Screen
{

    public $place;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Place $place): array
    {
        return [
            'place' => $place
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->place->exists ? 'Редактировать пост' : "Создать новый пост";
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
                ->method('save')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('place.name')
                    ->title(' Название')
                    ->placeholder('ВВеди Название')
                    ->required(),
                Input::make('place.description')
                    ->title('Описание')
                    ->placeholder('Введи описание')
                    ->required(),
                Input::make('place.address')
                    ->title('Адрес'),
                Input::make('place.price_from')
                    ->title('цена от')
                    ->type('number'),
                Input::make('place.slug')
                    ->title('url ')
                    ->required(),
                Upload::make('place.attachments')
                    ->title('сохранить фото'),
                Select::make('place.city_id')
                    ->title('Город')
                    ->fromModel(City::class, 'name')
                    ->required(),
                Select::make('place.category_id')
                    ->title('Категория')
                    ->fromModel(Category::class, 'name')
                    ->required()
            ])
        ];
    }
    public function save(Place $place, Request $request)
    {
        $place->fill($request->get('place'))->save();

        $place->attachment()->syncWithoutDetaching(
            $request->input('place.attachments', [])
        );
        Alert::info('YeS');
        return redirect()->route('platform.places');
    }
}
