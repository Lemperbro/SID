<?php
namespace App\Repositories;

use App\Models\Profile;
use Exception;

class ProfileRepository {
    private $SaveImageRepository;

    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function getData(){
        $data = Profile::latest()->first();

        return $data;
    }

    public function create($data){
        $check = Profile::get();

        if($check->count() > 0){
            return redirect()->back()->with('toast_error', 'Action Gagal');
        }

        $image = $this->SaveImageRepository->saveImageSingle($data->image, 'image');

        Profile::create([
            'image' => $image,
            'isi' => $data->profile
        ]);

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menambah data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menambah data');   
        }
    }

    public function update($data, $dataOld){
        if($data->hasFile('image')){
            $image = $this->SaveImageRepository->updateImageSingle($data->image,'image',$dataOld->image);
        }else{
            $image = $dataOld->image;
        }

        $dataOld->update([
            'image' => $image,
            'isi' => $data->profile 
        ]);

        try{
            return redirect()->back()->with('toast_success', 'Berhasil memperbarui data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_success', 'Tidak berhasil memperbarui data');   
        }
    }
}