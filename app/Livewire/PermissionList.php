<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class PermissionList extends Component
{

    public $permissions;

    public function render()
    {
        return view('livewire.permission-list');
    }

    public function mount()
    {
        $this->permissions = User::all();
    }
}
