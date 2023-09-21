<?php

namespace App\Repositories;

use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\File;
use App\Repositories\SaveImageRepository;
use Exception;

class HomeRepository{
    private $SaveImageRepository;
    
    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function index(){
        $struktur = [
            ['nama' => 'Jarwo', 'img' => 'ft1.jpg', 'jabatan' => 'Kepala Desa'],
            ['nama' => 'Paijo', 'img' => 'ft2.jpg', 'jabatan' => 'Wakil Kepala Desa'],
            ['nama' => 'Alucard', 'img' => 'ft3.jpg', 'jabatan' => 'Sekretaris'],
            ['nama' => 'Alucard', 'img' => 'ft4.jpg', 'jabatan' => 'Bendhara'],
        ];

        $umkm = [
            ['namaToko' => 'ipsum dolor sit amet consectetur', 'img' => '1.jpg'],
            ['namaToko' => 'ipsum dolor sit amet consectetur', 'img' => '2.jpg'],
            ['namaToko' => 'ipsum dolor sit amet consectetur', 'img' => '3.jpg'],
            ['namaToko' => 'ipsum dolor sit amet consectetur', 'img' => '4.jpg'],
        ];



        return [
            'struktur' => $struktur,
            'umkm' => $umkm,
        ];
    }

    public function getCarousel(){
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        return $carousel;
    }

    public function getDetailImageCarousel($index){
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        $index = $index - 1; // Indeks item yang ingin diambil
        if (!array_key_exists($index, $carousel['image'])) {
            // Redirect jika indeks tidak ada
            return redirect()->back()->with('toast_error', 'Item Not Found.');
        }
        return $item = $carousel['image'][$index];
    }

    public function updateCarousel($data, $id){
        $data->validate([
            'image' => 'max:2048|mimes:png,jpg,jpeg'
        ]);

        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        $index = $id;
        if (!array_key_exists($index, $carousel['image'])) {
            // Redirect jika indeks tidak ada
            return redirect('/carousels')->with('toast_error', 'Item Not Found.');
        }
        $img_old = $carousel['image'][$index]['image'];

        if($data->hasFile('image')){
            $img = $this->SaveImageRepository->updateImageSingle($data->image,'carousel',$img_old);
        }else{
            $img = $img_old;
        }

        $carousel['image'][$index]['image'] = $img;

        $proses = File::put($carouselFile, json_encode($carousel, JSON_PRETTY_PRINT));

        try{
            return redirect('/admin/carousel')->with('toast_success', 'Berhasil mengubah data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil mengubah data');
        }


    }

    public function updateTulisan($data){
        $carouselFile = public_path('carousel/carousel.json');
        $carousel = json_decode(file_get_contents($carouselFile), true);
        $data->validate([
            'title1' => 'required',
            'title2' => 'required'
        ]);

        $carousel['title']['title1'] = $data->title1;
        $carousel['title']['title2'] = $data->title2;

        $proses = File::put($carouselFile, json_encode($carousel, JSON_PRETTY_PRINT));

        try{
            return redirect('/admin/carousel')->with('toast_success', 'Berhasil mengubah data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil mengubah data');
        }

    }
}