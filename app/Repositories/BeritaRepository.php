<?php

namespace App\Repositories;

use Exception;
use App\Models\Berita;
use App\Models\BeritaKategori;
use App\Repositories\SaveImageRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaRepository
{

    private $SaveImageRepository;

    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function getAll($pagiante)
    {
        $data = Berita::with('beritaKategori')->whereNotIn('beritaKategori', [$this->kategoriInfoPenting()->id])->latest();

        if (request('kategori')) {
            $kategori = BeritaKategori::where('kategori', request('kategori'))->first();
            if ($kategori !== null) {
                $data = Berita::with('beritaKategori')->where('BeritaKategori', $kategori->id)->latest();

            }
        }
        if (request('admin-berita-kategori') !== null) {
            $data = Berita::with('beritaKategori');

            if (request('admin-berita-kategori') == 'terlama') {
                $data->whereNotIn('beritaKategori', [$this->kategoriInfoPenting()->id])->oldest();
            } elseif (request('admin-berita-kategori') == 'terbaru') {
                $data->whereNotIn('beritaKategori', [$this->kategoriInfoPenting()->id])->latest();
            } elseif (request('admin-berita-kategori') == 'favorit') {
                $data->whereNotIn('beritaKategori', [$this->kategoriInfoPenting()->id])->orderBy('views', 'DESC');
            } elseif (request('admin-berita-kategori') == 'info penting') {
                $data->where('beritaKategori', $this->kategoriInfoPenting()->id);
            }
        }

        if (request('search')) {
            $data = Berita::with('beritaKategori')->where('judul', 'like', '%' . request('search') . '%');
        }
        return $data->paginate($pagiante);
    }
    public function kategoriInfoPenting()
    {
        $data = BeritaKategori::where('kategori', 'info penting')->first();
        if ($data == null) {
            return $this->checkKategoriInfoPenting();
        }
        return $data;
    }
    public function checkKategoriInfoPenting()
    {
        $kategori = BeritaKategori::where('kategori', 'info penting')->get();
        if ($kategori->count() < 1) {
            $up =  BeritaKategori::create([
                'kategori' => 'info penting'
            ]);
            return $up;
        }
    }
    public function getBerita($data)
    {
        if ($data !== null) {
            $data->update([
                'views' => $data->views + 1
            ]);
        }
        return $data;
    }
    public function getBeritaLain($notId, $pagiante)
    {
        $data = Berita::whereNotIn('id', [$notId])->whereNotIn('beritaKategori', [$this->kategoriInfoPenting()->id]);
        return $data->paginate($pagiante);
    }

    public function beritaFavorit($pagiante)
    {   

        $data = Berita::orderBy('views', 'DESC')->whereNotIn('beritaKategori',[$this->kategoriInfoPenting()->id])->paginate($pagiante);

        return $data;
    }

    public function getKategori()
    {
        $data = BeritaKategori::latest()->get();

        return $data;
    }

    public function beritaCreate($data)
    {
        $checkKategori = BeritaKategori::where('id', $data->kategori)->get();

        if ($checkKategori->count() == 0) {
            return redirect()->back()->with('toast_error', 'Gagal menambah berita');
        }

        $image = $this->SaveImageRepository->saveImageSingle($data->image, 'image');

        Berita::create([
            'judul' => $data->judul,
            'image' => $image,
            'isi' => $data->isi,
            'BeritaKategori' => $data->kategori
        ]);

        try {
            return redirect('/admin/berita')->with('toast_success', 'Berhasil menambah berita');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_erro', 'Tidak berhasil menambah berita');
        }
    }

    public function BeritaUpdate($data, $dataLama)
    {
        $checkKategori = BeritaKategori::where('id', $data->kategori)->get();
        if ($checkKategori->count() == 0) {
            return redirect()->back()->with('toast_error', 'Gagal menambah berita');
        }

        if ($data->hasFile('image')) {
            $image = $this->SaveImageRepository->updateImageSingle($data->image, 'image', $dataLama->image);
        } else {
            $image = $dataLama->image;
        }

        $dataLama->update([
            'slug' => SlugService::createSlug(Berita::class, 'slug', $data->judul),
            'judul' => $data->judul,
            'image' => $image,
            'isi' => $data->isi,
            'BeritaKategori' => $data->kategori
        ]);


        try {
            return redirect('/admin/berita')->with('toast_success', 'Berhasil memperbarui berita');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_erro', 'Tidak berhasil memperbarui berita');
        }
    }
    public function getInfoPenting()
    {
        $beritaKategori = BeritaKategori::where('kategori', 'info penting')->first();
        if ($beritaKategori !== null) {
            $data = Berita::where('BeritaKategori', $beritaKategori->id)->get();
            return $data;
        }
    }
    public function storeKategori($data)
    {
        $kategori = strtolower($data->kategori);
        $checkKategori = BeritaKategori::where('kategori', $kategori)->get();
        $checkKategoriSoftDelete = BeritaKategori::onlyTrashed()->where('kategori', $kategori)->get();
        if ($checkKategoriSoftDelete->count() > 0) {
            $restore = BeritaKategori::onlyTrashed()->where('kategori', $kategori)->restore();
            if ($restore) {
                return redirect('/admin/kategori-berita')->with('toast_success', 'Berhasil menambah kategori');
            }
        }
        if ($checkKategori->count() > 0) {
            return redirect()->back()->with('toast_error', 'Kategori sudah tersedia');
        }
        BeritaKategori::create([
            'kategori' => $kategori
        ]);


        try {
            return redirect('/admin/kategori-berita')->with('toast_success', 'Berhasil menambah kategori');
        } catch (Exception $e) {
            return redirect('/admin/kategori-berita')->with('toast_error', 'Tidak berhasil menambah kategori');
        }
    }

    public function updateKategori($data, $kategoriId)
    {
        $kategori = strtolower($data->kategori);
        $checkKategori = BeritaKategori::where('kategori', $kategori)->whereNotIn('id', [$data->id])->get();

        if ($checkKategori->count() > 0) {
            return redirect()->back()->with('toast_error', 'Kategori sudah tersedia');
        }
        if ($kategoriId->id == $this->kategoriInfoPenting()->id) {
            return redirect()->back()->with('toast_error', 'Action Gagal');
        }
        $kategoriId->update([
            'kategori' => $kategori
        ]);

        try {
            return redirect('/admin/kategori-berita')->with('toast_success', 'Berhasil memperbarui data kategori');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Berhasil memperbarui data kategori');
        }
    }
}
