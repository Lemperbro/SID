<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRepository{

    public function hitungUser(){
       return User::get()->count();
    }

    public function login($data){
        $credentials = $data;
        if (Auth::attempt($credentials)) {
            $data->session()->regenerate();
            return redirect('/admin');
        }
 
        return back()->with('LoginError', 'Login Failed!');
    }
    
}