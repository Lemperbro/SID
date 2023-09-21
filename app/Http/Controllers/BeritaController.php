<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\BeritaKategori;
use App\Http\Controllers\Controller;
use App\Repositories\BeritaRepository;
use App\Http\Requests\BeritaStoreRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Http\Requests\KategoriBeritaStoreRequest;

class BeritaController extends Controller
{
    //
    private $BeritaRepository;

    public function __construct()
    {
        $this->BeritaRepository = new BeritaRepository();
    }
    public function index(){
        $allBerita = $this->BeritaRepository->getAll(10);
        $kategoriBerita = $this->BeritaRepository->getKategori();
        $beritaFavorit = $this->BeritaRepository->beritaFavorit(5);
        
        return view('user.Berita.berita',compact('allBerita','kategoriBerita','beritaFavorit'));
    }

    public function read(Berita $id){
        $data = $this->BeritaRepository->getBerita($id);
        $beritaLain = $this->BeritaRepository->getBeritaLain($id->id,8);
        $kategoriBerita = $this->BeritaRepository->getKategori();
        $beritaFavorit = $this->BeritaRepository->beritaFavorit(5);


        return view('user.Berita.read', compact('data','kategoriBerita','beritaLain', 'beritaFavorit'));
    }

    public function adminIndex(){
        $data = $this->BeritaRepository->getAll(7);
        $this->BeritaRepository->checkKategoriInfoPenting();
        return view('admin.Berita.berita', compact('data'));
    }

    public function create(){
        $kategori = $this->BeritaRepository->getKategori();
        return view('admin.Berita.add', compact('kategori'));
    }
    public function store(BeritaStoreRequest $request){
        $up = $this->BeritaRepository->beritaCreate($request);

        return $up;
    }

    public function edit(Berita $id){
        $data = $id;
        $kategori = $this->BeritaRepository->getKategori();
        return view('admin.Berita.edit', compact('data', 'kategori'));
    }
    public function update(BeritaUpdateRequest $request, Berita $id){
        $up = $this->BeritaRepository->BeritaUpdate($request, $id);

        return $up;
    }

    public function hapus(Berita $id){
        $id->delete();

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menghapus berita');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus berita');
        }
    }
    public function kategoriBerita(){
        $data = $this->BeritaRepository->getKategori();
        return view('admin.Berita.kategori', compact('data'));
    }

    public function createKategori(){
        return view('admin.Berita.addKategori');
    }

    public function storeKategori(KategoriBeritaStoreRequest $request){
        $up = $this->BeritaRepository->storeKategori($request);
        return $up;
    }

    public function editKategori(BeritaKategori $id){
        $data = $id;

        return view('admin.Berita.editKategori', compact('data'));
    }

    public function updateKategori(Request $request, BeritaKategori $id){
        $validasi = $request->validate([
            'kategori' => 'required'
        ]);

        $up = $this->BeritaRepository->updateKategori($request, $id);
        return $up;
    }

    public function hapusKategori(BeritaKategori $id){
        $id->delete();

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menghapus kategori');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus kategori');
        }
    }
}
