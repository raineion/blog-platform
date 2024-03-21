<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Searchbox extends Component
{

    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search', search : $this->search);
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }
    
    public function render()
    {
        return view('livewire.search-box');
    }
}
