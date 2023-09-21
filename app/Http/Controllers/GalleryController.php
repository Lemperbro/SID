<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriCreateRequest;
use App\Http\Requests\GaleriUpdateRequest;
use App\Models\Gallery;
use App\Repositories\GalleryRepository;
use Exception;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    private $GalleryRepository;

    public function __construct()
    {
        $this->GalleryRepository = new GalleryRepository();
    }

    public function index(){
        $data = $this->GalleryRepository->getAll(12);
        if(request('view')){
            $view = $this->GalleryRepository->getOne(request('view'));
        }else{
            $view = null;
        }
        return view('user.galeri.galeri', compact('data', 'view'));
    }

    public function adminIndex(){
        $data = $this->GalleryRepository->getAll(12);
        return view('admin.Galeri.galeri', compact('data'));
    }
    public function create(){
        return view('admin.Galeri.add');
    }
    public function store(GaleriCreateRequest $request){
        $up = $this->GalleryRepository->create($request);

        return $up;
    }

    public function edit(Gallery $id){
        $data = $id;
        return view('admin.Galeri.edit', compact('data'));
    }
    public function update(GaleriUpdateRequest $request, Gallery $id){
        $up = $this->GalleryRepository->update($request, $id);

        return $up;
    }

    public function hapus(Gallery $id){
        $id->delete();

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menghapus data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus data');
        }
    }
}

