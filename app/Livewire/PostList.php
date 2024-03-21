<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class PostList extends Component
{   
    use WithPagination;

    #[Url()]
    public $sort = 'desc';
    public $search = '';

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
        ->orderBy('published_at', $this->sort)
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(3);
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
