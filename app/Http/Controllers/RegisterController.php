<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterSaveRequest;
use App\Repositories\RegisterRepository;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $RegsiterRepository;

    public function __construct()
    {
        $this->RegsiterRepository = new RegisterRepository();
    }

    public function index(){
        return view('Auth.register');
    }

    public function save(RegisterSaveRequest $request){
        $save = $this->RegsiterRepository->save($request);

        return $save;
    }
    
}
