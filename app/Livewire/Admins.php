<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Hash;

class Admins extends Component
{
   
    public $check = true;
    public $roles;
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $role;

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.admins');
    }

    public function updated($field)
    {
        $this->validateOnly($field,[
            'name'      => 'required',
            'mobile'    => 'required | min:10',
            'email'     => 'required | email',
            'password'  => 'required',
            'role'     => 'required'
        ]);
    }
    public function save()
    {
         $this->validate([
            'name'      => 'required',
            'mobile'    => 'required | min:10 | max:10',
            'email'     => 'required | email',
            'password'     => 'required',
            'role'     => 'required'
         ]);
        $admin = new User();
        $admin->name = $this->name;
        $admin->email = $this->email;
        // $admin->password = $this->password;
        $admin->password = Hash::make($this->password);
        $admin->mobile = $this->mobile;
        $admin->role = $this->role;
        $admin->save();
        session()->flash('success','Add data successfully.');
        $this->resetFilter();
    }
    public function resetFilter()
    {
        $this->reset(['name','mobile','email','password','role']);
    }
}
