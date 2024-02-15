<?php

namespace App\Livewire;

// use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Post;
use App\Models\Categorie;

class Home extends Component
{
    use WithPagination;
    public $categoryname;     
    public $search='';     
    public $searchCategory;       
    public function render()
    {
        
        if(! $this->search){
            $posts = Post::orderBy('id', 'desc')->paginate(3);
            $this->categoryname = Categorie::all();
        }elseif($this->search){
            $posts=Post::where('title','like','%' .$this->search. '%')->paginate(3);
            
        }else{
            $posts=Post::where('category_id', $this->searchCategory)->get();
        }
        return view('livewire.home',[
            'posts'=>$posts,
        ]);
        
        
    }
}
