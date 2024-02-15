<?php

namespace App\Livewire;

// use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Post;
use App\Models\Categorie;
use App\Models\Comment;
use Livewire\Attributes\Validate;

class BlogDetail extends Component
{
    use WithPagination;
    public $categoryname;
    public $posts;
    public $title;
    public $comment;
    public $blog_id;
    public $name;
    public $commentsblog;


    public function mount($id)
    {
        $this->posts=Post::where('id', $id)->first();
        $this->blog_id= $this->posts->id;
        // dd($this->posts);
        $this->categoryname = Categorie::all(); 
        $this->commentsblog = Comment::where('blog_id', $this->blog_id)->get();
    }
    public function render()
    {   
        return view('livewire.blog-detail');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'comment' => 'required'
        ]);
        $comments = new Comment();
        $comments->blog_id = $this->blog_id;
        $comments->name = $this->name;
        $comments->comment = $this->comment;
        $comments->save();
        $this->resetFilter();

    }
    public function resetFilter()
    {
        $this->reset(['comment','name']);

    }
}
