<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserProfileRepository {

    public function update($data, $dataOld){
        $checkEmail = User::where('email', $data->email)->whereNotIn('id',[$dataOld->id])->get();


        if($data->password !== null){
            $data->validate([
                'password' => 'required|confirmed|min:8|max:255'
            ]);
            $password = bcrypt($data->password); 
        }else{
            $password = $dataOld->password;
        }

        if($checkEmail->count() > 0){
            return redirect()->back()->with('toast_error', 'Email sudah dipakai');
        }
        $dataOld->update([
            'username' => $data->username,
            'email' => $data->email,
            'phone' => $data->phone,
            'password' => $password 
        ]);
        
        try{
            return redirect()->back()->with('toast_success','Berhasil memperbarui data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil memperbarui data');
        }

    }
}