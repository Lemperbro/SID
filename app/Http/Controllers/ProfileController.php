<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $ProfileRepository;

    public function __construct()
    {
        $this->ProfileRepository = new ProfileRepository();
    }

    public function index(){
        $data = $this->ProfileRepository->getData();
        return view('user.profile.profile', compact('data'));
    }

    public function adminIndex(){
        $data = $this->ProfileRepository->getData();
        return view('admin.Profile.profile', compact('data'));
    }

    public function add(ProfileCreateRequest $request){
        $up = $this->ProfileRepository->create($request);

        return $up;
    }

    public function update(ProfileUpdateRequest $request, Profile $id){
        $up = $this->ProfileRepository->update($request, $id);

        return $up;
    }
}
