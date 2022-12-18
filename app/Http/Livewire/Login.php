<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Session;

class Login extends Component
{
    public $Email;
    public $Password;

    public function login()
    {
        if(is_null($this->Email) || is_null($this->Password)){
            Session::flash('error', 'Email/Password harus diisi !');
        }
        if(Auth::attempt(['email' => $this->Email, 'password'=> $this->Password])) {
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Email/Password salah !');
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }

    

}
