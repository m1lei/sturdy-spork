<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Orchid\Screens\CategoryEditController;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPlace extends Component
{
    use WithPagination; //трейт динамической подгрузки

    #[Url(history: true)]
    public $city_slug = '';

    #[Url(history: true)]
    public $category_slug = '';

    public $perPage = 3;//кол-во статей при первой загрузки

    public function updateCitySlug() { $this->resetPage(); $this->perPage = 6;}
    public function updateCategorySlug() { $this->resetPage(); $this->perPage = 6;}

    public function loadMore()
    {
        $this->perPage += 3;//увеличивать кол-во статей при нажатии
    }

    public function render()
    {
        $city = City::all();
        $category = Category::all();

        $query = Place::with(['city', 'category', 'attachment']);

        if ($this->city_slug){
            $query->whereHas('city', function ($q){
                $q->where('slug', $this->city_slug);
            });
        }

        if ($this->category_slug){
            $query->whereHas('category', function ($q){
                $q->where('slug', $this->category_slug);
            });
        }
        return view('livewire.index-place',[
            'places' => $query->latest()->paginate($this->perPage),
            'city' => $city,
            'category' => $category
        ]);
    }
}
