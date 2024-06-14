<?php

namespace App\Http\Controllers;

use App\Http\Requests\UmkmCreateRequest;
use App\Http\Requests\UmkmUpdateRequest;
use App\Models\Umkm;
use App\Repositories\UmkmRepository;
use Exception;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    //
    private $UmkmRepository;

    public function __construct()
    {
        $this->UmkmRepository = new UmkmRepository();
    }

    public function index()
    {
        $data = $this->UmkmRepository->getAll(12);
        return view('user.Umkm.umkm', compact('data'));
    }
    public function read(Umkm $id)
    {
        $data = $this->UmkmRepository->getUmkm($id);
        $umkmLain = $this->UmkmRepository->getUmkmLain($id->id, 8);
        return view('user.Umkm.view', compact('data', 'umkmLain'));
    }
    public function redirect(Umkm $id)
    {

        $phoneNumber = $id->phone;
        $produk = explode("|", $id->produk);
        $text = 'Hai, Mau pesan apa?' . PHP_EOL;
        foreach ($produk as $produks) {
            $text .= '- ' . $produks . ',' . PHP_EOL;
        }
        $whatsappLink = 'https://api.whatsapp.com/send?phone=+62' . $phoneNumber . '&text=' . urlencode($text);
        return redirect()->away($whatsappLink);
    }

    public function adminIndex()
    {
        $data = $this->UmkmRepository->getAll(8);
        return view('admin.Umkm.umkm', compact('data'));
    }

    public function create()
    {
        return view('admin.Umkm.add');
    }
    public function store(UmkmCreateRequest $request)
    {
        $up = $this->UmkmRepository->create($request);

        return $up;
    }

    public function edit(Umkm $id)
    {
        $data = $id;
        return view('admin.Umkm.edit', compact('data'));
    }

    public function update(UmkmUpdateRequest $request, Umkm $id)
    {
        $up = $this->UmkmRepository->update($request, $id);
        return $up;
    }
    public function delete(Umkm $id)
    {
        $id->delete();

        try {
            return redirect()->back()->with('toast_success', 'Berhasil menghapus data');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus data');
        }
    }
}
