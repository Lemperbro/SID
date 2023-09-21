<?php
namespace App\Repositories;

use App\Models\User;
use Exception;

class RegisterRepository {

    public function register(){

    }

    public function save($data){
        $check = User::where('email', $data->email)->get();

        if($check->count() > 0){
            return redirect()->back();
        }
        if(User::get()->count() > 0){
            $role = 'admin';
        }elseif(User::get()->count() < 1){
            $role = 'super admin';
        }

        $password = bcrypt($data->password);
        $save = User::create([
            'username' => $data->username,
            'password' => $password,
            'email' => $data->email,
            'phone' => $data->phone,
            'role' => $role
        ]);

        try{
            return redirect('/login')->with('toast_success', 'Berhasil Mendaftar');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Gagal Mendaftar');
        }
        
    }
}