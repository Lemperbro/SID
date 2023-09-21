<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    
    private $UserProfileRepository;

    public function __construct()
    {
        $this->UserProfileRepository = new UserProfileRepository();
    }

    public function index(){
        $data = Auth()->user();
        return view('admin.userProfile.index', compact('data'));
    }

    public function update(UserProfileUpdateRequest $request){
        $data = Auth()->user();
        $up = $this->UserProfileRepository->update($request, $data);

        return $up;
    }
}
