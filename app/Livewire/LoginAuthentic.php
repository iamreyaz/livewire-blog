<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Hash;
use Auth;

class LoginAuthentic extends Component
{
    public $email;
    public $password;
    public $roles;
    public $role;
    public $route;

    public function render()
    {
        if(Auth::user()){
            $this->route = $this->redirectDash();
            return redirect($this->route);
        }
        return view('livewire.login-authentic');
    }
    public function mount()
    {
        $this->roles = Role::all();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required | email',
            'password' => 'required',
            'role' => 'required'
        ]);
    }
    public function save()
    {
        $this->validate([
            'email' => 'required | email',
            'password' => 'required',
            'role' => 'required'
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'role' => $this->role])) {
            // dd($this->email,$this->password,$this->role);
            session()->flash('success', 'You are login successfully');
            return redirect('dashboard');
        } else {
            session()->flash('error', 'Email and password Or role are wrong.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'You are logged out successfully!');
    }

    public function resetFilter()
    {
        $this->reset(['email', 'password', 'role']);
    }

    public function redirectDash()
    {
        $redirect = '';
        if(Auth::User() && Auth::User()->role == 1){
            $redirect = '/admin/dashboard';
        }
        else if(Auth::User() && Auth::User()->role == 2){
            $redirect = '/author/dashboard';
        }
        else if(Auth::User() && Auth::User()->role == 3){
            $redirect = '/editor/dashboard';
        }else{
            $redirect ='/login';
        }

        return $redirect;
    }
}
