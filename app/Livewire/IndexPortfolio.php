<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Portfolio;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPortfolio extends Component
{
    use WithPagination;

    #[Usl(history: true)]
    public $category_slug = '';

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

        if ($this->category_slug){
            $query->wherehas('place', function ($q) {
                $q->where('category_id', $this->category_slug);
            });
        }
        $portfolio = $query->latest()->paginate($this->perPage);

        return view('livewire.index-portfolio', [
            'portfolio' => $portfolio,
            'category' => $category
        ]);
    }
}
