<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\LoginRepository;
use App\Http\Requests\LoginProsesRequest;

class LoginController extends Controller
{
    //
    private $LoginRepository;

    public function __construct()
    {
        $this->LoginRepository = new LoginRepository();
    }

    public function index(){
        $hitungUser = $this->LoginRepository->hitungUser();
        return view('Auth.login', [
            'hitungUser' => $hitungUser
        ]);
    }

    public function login(LoginProsesRequest $request){
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }
 
        return back()->with('LoginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
