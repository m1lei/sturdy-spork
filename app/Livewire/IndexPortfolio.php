<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Portfolio;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPortfolio extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $category = '';

    public $perPage = 3;

    public function updateCategorySlug() {$this->resetPage(); $this->perPage = 3;}


    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        $category = Category::all();

        $query = Portfolio::with(['place.category', 'attachment'])->whereHas('place');

        if ($this->category){
            $query->wherehas('place', function ($q) {
                $q->where('category_id', $this->category);
            });
        }
        $portfolio = $query->latest()->paginate($this->perPage);

        return view('livewire.index-portfolio', [
            'portfolio' => $portfolio,
            'categories' => $category
        ]);
    }
}
