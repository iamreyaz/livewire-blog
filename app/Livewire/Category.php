<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categorie;

class Category extends Component
{
    public $category_name;
    public function render()
    {
        return view('livewire.category');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
            'category_name'      => 'required'
        ]);
    }
    public function save()
    {
         $this->validate([
            'category_name'      => 'required'           
         ]);
        $admin = new Categorie();
        $admin->category_name = $this->category_name;
        $admin->save();
        session()->flash('success','Add Categrory Successfully.');
        $this->resetFilter();
    }
    public function resetFilter()
    {
        $this->reset(['category_name']);
    }
}
