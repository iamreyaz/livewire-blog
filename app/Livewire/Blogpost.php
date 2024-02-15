<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Role;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Blogpost extends Component
{
    use WithFileUploads;
    #[Validate('image|max:1024')] // 1MB Max
    public $photo;
    public $check = true;
    public $title;
    public $description;
    public $author_id;
    public $author_name;
    public $category_id;
    public $categoryname;

    public function mount()
    {
        $this->categoryname = Categorie::all();
        $this->author_name = User::where('role', 2)->get();
    }
    public function render()
    {         
        // $author_name = Role::all();
        return view('livewire.blogpost');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
            'title'      => 'required',
            'description'    => 'required | min:10',
            'author_id'     => 'required',
            'category_id'  => 'required',
            'photo'     => 'required'
        ]);
    }
    public function save()
    {
         $this->validate([
            'title'      => 'required',
            'description'    => 'required | min:10',
            'author_id'     => 'required',
            'category_id'     => 'required',
            'photo'     => 'required'
         ]);
        $blogpost = new Post();
        $blogpost->title = $this->title;
        $blogpost->description = $this->description;
        $blogpost->author_id = $this->author_id;
        $blogpost->category_id = $this->category_id;
        $blogpost->photo=$this->photo->store('photos','public');        
        $blogpost->save();
        session()->flash('success','Add blog successfully.');
        $this->resetFilter();
    }
    public function resetFilter()
    {
        $this->reset(['title','description','author_id','photo','category_id']);
    }
}
