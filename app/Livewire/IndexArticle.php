<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class IndexArticle extends Component
{
    public $perPage = 3;

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        $articles = Article::latest()->paginate($this->perPage);
        return view('livewire.index-article',['articles'=>$articles]);
    }
}
