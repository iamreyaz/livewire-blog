<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success','You are logout successfully!');
        // session()->flash('success', 'You are logout successfully');
    }
}
