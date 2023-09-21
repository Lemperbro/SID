<?php

namespace App\Repositories;

use App\Models\StrukturOrganisasi;
use App\Repositories\SaveImageRepository;
use Exception;
use Illuminate\Support\Facades\Redirect;

class PemerintahanRepository{

    private $SaveImageRepository;


    public function __construct()
    {
        $this->SaveImageRepository = new SaveImageRepository();
    }
    public function getAll($paginate = null){

        // $data = StrukturOrganisasi::latest();
        // if($paginate !== null){
        //     return $data->paginate($paginate);
        // }
        $jabatanList = [
            'kepala desa', 
            'sekretaris', 
            'kasi pemerintahan', 
            'kasi kesejahteraan', 
            'kasi pelayanan', 
            'kaur usaha', 
            'kaur keuangan', 
            'kaur perencanaan', 
            'kepala dusun'
        ];

        $strukturPemerintahan = StrukturOrganisasi::whereIn('jabatan', $jabatanList)
        ->orderByRaw("FIELD(jabatan, '" . implode("','", $jabatanList) . "')");
        if(request('search')){
            $strukturPemerintahan = StrukturOrganisasi::whereIn('jabatan', $jabatanList)->where('nama', 'like', '%'.request('search').'%')
            ->orderByRaw("FIELD(jabatan, '" . implode("','", $jabatanList) . "')");
        }
        return $strukturPemerintahan->paginate($paginate);
    }



    public function store($data){

        if(!in_array($data['jabatan'], ['kepala desa', 'sekretaris', 'kasi pemerintahan', 'kasi kesejahteraan', 'kasi pelayanan', 'kaur tata usaha', 'kaur keuangan', 'kaur perencanaan', 'kepala dusun'])){
            return redirect()->back()->with('toast_error', 'Gagal Menambah Data');
        }
        $checkJabatan = StrukturOrganisasi::where('jabatan', $data['jabatan'])->get();
        if($checkJabatan->count() > 0){
            return redirect()->back()->with('toast_error', 'Pegawai dengan jabatan '.$data['jabatan'].' sudah ada');
        }

        $image = $this->SaveImageRepository->saveImageSingle($data['image'], 'FtStruktur');
        StrukturOrganisasi::create([
            'nama' => $data['nama'],
            'image' => $image,
            'jabatan' => $data['jabatan'],
            'AwalJabat' => $data['masuk'],
            'AkhirJabat' => $data['keluar']
        ]);

        try{
            return redirect('/admin/struktur-pemerintahan')->with('toast_success', 'Berhasil Menambah Data');
        }catch(Exception $e){
            return redirect('/admin/struktur-pemerintahan')->with('toast_error', 'Tidak Berhasil Menambah Data');
        }
    }

    public function update($data, $id){
        if(!in_array($data->jabatan, ['kepala desa', 'sekretaris', 'kasi pemerintahan', 'kasi kesejahteraan', 'kasi pelayanan', 'kaur tata usaha', 'kaur keuangan', 'kaur perencanaan', 'kepala dusun'])){
            return redirect()->back()->with('toast_error', 'Gagal Menambah Data');
        }

        $checkJabatan = StrukturOrganisasi::where('jabatan', $data->jabatan)->whereNotIn('id', [$id->id])->get();
        if($checkJabatan->count() > 0){
            return redirect()->back()->with('toast_error', 'Pegawai dengan jabatan '.$data->jabatan.' sudah ada');
        }
        if($data->hasFile('image')){
            $image = $this->SaveImageRepository->updateImageSingle($data->image,'FtStruktur',$id->image);
        }else{
            $image = $id->image;
        }

        $id->update([
            'nama' => $data->nama,
            'image' => $image,
            'jabatan' => $data->jabatan,
            'AwalJabat' => $data->masuk,
            'AkhirJabat' => $data->masuk
        ]);

        try{
            return redirect('/admin/struktur-pemerintahan')->with('toast_success', 'Berhasil Memperbarui Data');
        }catch(Exception $e){
            return redirect('/admin/struktur-pemerintahan')->with('toast_error', 'Tidak Berhasil Memperbarui Data');
        }

    }


}