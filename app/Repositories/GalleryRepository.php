<?php

namespace App\Repositories;

use Exception;
use App\Models\Gallery;
use App\Repositories\SaveImageRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class GalleryRepository{
    
    private $SaveImageRepository;

    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function getAll($paginate){
        $data = Gallery::latest();

        if(request('search')){
            $data->where('caption','like','%'.request('search').'%');
        }
        return $data->paginate($paginate);
    }

    public function getOne($slug){
        $data = Gallery::where('slug', $slug)->first();

        return $data;
    }

    public function create($data){
        $image = $this->SaveImageRepository->saveImageMultiple($data->image,'Galeri');

        Gallery::create([
            'image' => $image,
            'caption' => $data->judul
        ]);

        try{
            return redirect('/admin/galeri')->with('toast_success', 'Berhasil menambah foto');
        }catch(Exception $e){
            return redirect()->back()->with('toast_success', 'Tidak berhasil menambah foto');
        }

    }

    public function update($data, $dataOld){
        if($data->hasFile('image')){
            $image = $this->SaveImageRepository->updateImageMultiple($data->image,'Galeri',$dataOld->image);
        }else{
            $image = $dataOld->image;
        }

        $dataOld->update([
            'image' => $image,
            'slug' => SlugService::createSlug(Gallery::class, 'slug', $data->judul),
            'caption' => $data->judul
        ]);

        try{
            return redirect('/admin/galeri')->with('toast_success', 'Berhasil memperbarui data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil memperbarui data');
        }
    }


}