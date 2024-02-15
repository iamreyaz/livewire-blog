<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Categorie;

class BlogList extends Component
{
    public $bloglist;
    public $category;

    public function render()
    {
        return view('livewire.blog-list');
    }
    public function mount()
    {
        $this->bloglist = Post::all();
        $this->category = Categorie::all();
    }
}
