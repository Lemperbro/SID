<?php

namespace App\Repositories;

use Exception;
use App\Models\ProgramDesa;
use App\Models\ProgramKategori;
use App\Repositories\SaveImageRepository;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProgramDesaRepository
{

    private $SaveImageRepository;


    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }

    public function getAll($paginate)
    {
        $data = ProgramDesa::latest();
        if(request('kategori')){
            if(request('kategori') == 'unggulan'){
                $data->where('ProgramKategori', 'program unggulan');
            }
        }
        return $data->paginate($paginate);;
    }
    public function programUnggulan($paginate)
    {

        $data = ProgramDesa::where('ProgramKategori', 'program unggulan')->paginate($paginate);
        return $data;
    }


    public function programLainnya($paginate)
    {
        $data = ProgramDesa::where('ProgramKategori', null)->paginate($paginate);
        return $data;
    }
    public function create($data)
    {
        $image = $this->SaveImageRepository->saveImageSingle($data->image, 'image');

        if (!empty($data->programUnggulan)) {
            if ($data->programUnggulan == 'program unggulan') {
                $programKategori = 'program unggulan';
            }
        } else {
            $programKategori = null;
        }


        ProgramDesa::create([
            'image' => $image,
            'judul' => $data->judul,
            'deskripsi' => $data->deskripsi,
            'ProgramKategori' => $programKategori
        ]);

        try {
            return redirect('/admin/program-kerja')->with('toast_success', 'Berhasil menambah data');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Tidak berhasil menambah data');
        }
    }

    public function update($data, $dataOld)
    {

        if ($data->hasFile('image')) {
            $image = $this->SaveImageRepository->updateImageSingle($data->image, 'image', $dataOld->image);
        } else {
            $image = $dataOld->image;
        }

        if (!empty($data->programUnggulan)) {
            if ($data->programUnggulan == 'program unggulan') {
                $programKategori = 'program unggulan';
            }
        } else {
            $programKategori = null;
        }

        $dataOld->update([
            'slug' => SlugService::createSlug(ProgramDesa::class, 'slug', $data->judul),
            'judul' => $data->judul,
            'image' => $image,
            'deskripsi' => $data->deskripsi,
            'ProgramKategori' => $programKategori

        ]);

        try {
            return redirect('/admin/program-kerja')->with('toast_success', 'Berhasil memperbarui data');
        } catch (Exception $e) {
            return redirect()->back()->with('toast_error', 'Tidak berhasil memperbarui data');
        }
    }
}
