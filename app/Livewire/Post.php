<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $check = true;
    public $title;
    public $description;
    public $author;
    public $category;
    public function render()
    {
        return view('livewire.post');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
            'title'      => 'required',
            'description'    => 'required | min:10',
            'author'     => 'required',
            'category'  => 'required'
        ]);
    }
    public function save()
    {
         $this->validate([
            'title'      => 'required',
            'description'    => 'required | min:10',
            'author'     => 'required',
            'category'     => 'required'
         ]);
        $blogpost = new Post();
        $blogpost->title = $this->title;
        $blogpost->description = $this->description;
        $blogpost->author = $this->author;
        $blogpost->category = $this->category;
        $blogpost->save();
        session()->flash('success','Add blog successfully.');
        $this->resetFilter();
    }
    public function resetFilter()
    {
        $this->reset(['name','mobile','email','password','role']);
    }
}
