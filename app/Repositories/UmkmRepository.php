<?php

namespace App\Repositories;

use Exception;
use App\Models\Umkm;
use App\Models\Berita;
use App\Repositories\SaveImageRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class UmkmRepository{
    private $SaveImageRepository;

    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function getAll($paginate){
        $data = Umkm::latest();
        if(request('search')){
            $data->where('judul', 'like','%'.request('search').'%');
        }
        return $data->paginate($paginate);
    }
    
    public function getUmkm($data){
        if($data !== null){
            $data->update([
                'views' => $data->views + 1
            ]);
        }
        return $data;
    }

    public function getUmkmLain($notId, $paginate){
        $data = Umkm::whereNotIn('id', [$notId]);
        return $data->paginate($paginate);
    }

    public function create($data){
        $image = $this->SaveImageRepository->saveImageSingle($data->image, 'FtUmkm');
        $produk = explode("|", $data->produk);
        Umkm::create([
            'judul' => $data->nama,
            'phone' => $data->phone,
            'image' => $image,
            'produk' => implode("|",$produk),
            'isi' => $data->isi
        ]);

        try{
            return redirect('/admin/umkm')->with('toast_success', 'Berhasil menambah umkm');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Gagal menambah umkm');
        }
    }

    public function update($data, $dataOld){
        if($data->hasFile('image')){
            $image = $this->SaveImageRepository->updateImageSingle($data->image, 'FtUmkm', $dataOld->image);
        }else{
            $image = $dataOld->image;
        }
        $produk = explode("|", $data->produk);

        $dataOld->update([
            'image' => $image,
            'slug' => SlugService::createSlug(Umkm::class, 'slug', $data->nama),
            'phone' => $data->phone,
            'judul' => $data->nama,
            'produk' => implode("|", $produk),
            'isi' => $data->isi
        ]);

        try{
            return redirect('/admin/umkm')->with('toast_success', 'Berhasil memperbarui data umkm');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil memperbarui data umkm');
        }
    }
}