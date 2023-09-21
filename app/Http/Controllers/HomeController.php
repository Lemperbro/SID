<?php

namespace App\Http\Controllers;

use App\Repositories\BeritaRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\HomeRepository;
use App\Repositories\PemerintahanRepository;
use App\Repositories\SaveImageRepository;
use App\Repositories\UmkmRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $HomeRepository,
            $PemerintahanRepository,
            $BeritaRepository,
            $UmkmRepository,
            $GalleryRepository,
            $SaveImageRepository;

    public function __construct()
    {
        $this->HomeRepository = new HomeRepository();
        $this->PemerintahanRepository = new PemerintahanRepository();
        $this->BeritaRepository = new BeritaRepository();
        $this->UmkmRepository = new UmkmRepository();
        $this->GalleryRepository = new GalleryRepository();
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function index(){
        $imageCarousel = $this->HomeRepository->getCarousel()['image'];
        $titleCarousel = $this->HomeRepository->getCarousel()['title'];

        
        $pemerintahan = $this->PemerintahanRepository->getAll();

        $berita = $this->BeritaRepository->getAll(4);
        $beritaFavorit = $this->BeritaRepository->beritaFavorit(4);
        $kategoriBerita = $this->BeritaRepository->getKategori();
        $infoPenting = $this->BeritaRepository->getInfoPenting();

        $umkm = $this->UmkmRepository->getAll(8);

        $gallery = $this->GalleryRepository->getAll(6);

        return view('user.home.home', compact('pemerintahan', 'umkm', 'imageCarousel', 'titleCarousel', 'berita','beritaFavorit', 'kategoriBerita', 'infoPenting','gallery'));
    }

    public function indexCarousel(){
        $imageCarousel = $this->HomeRepository->getCarousel()['image'];
        $titleCarousel = $this->HomeRepository->getCarousel()['title'];

        return view('admin.carousel.index', compact('imageCarousel','titleCarousel'));
    }

    public function editCarousel($index){
        $data = $this->HomeRepository->getDetailImageCarousel($index);
        return view('admin.carousel.edit', compact('data'));
    }

    public function updateCarousel(Request $request, $id){
        $data = $this->HomeRepository->updateCarousel($request, $id);
        return $data;
    }

    public function updateTulisan(Request $request){
        $data = $this->HomeRepository->updateTulisan($request);
        return $data;
    }
    
}
