<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use App\Http\Controllers\Controller;
use App\Repositories\PemerintahanRepository;
use App\Http\Requests\PemerintahanStoreRequest;
use App\Http\Requests\PemerintahanUpdateRequest;
use Exception;

class PemerintahanController extends Controller
{
    //
    private $PemerintahanRepository;

    public function __construct()
    {
        $this->PemerintahanRepository = new PemerintahanRepository();
    }

    public function index(){

        $data = $this->PemerintahanRepository->getAll();
        
        return view('user.struktur.struktur', compact('data'));
    }

    public function adminIndex(){
        $data = $this->PemerintahanRepository->getAll();
        return view('admin.struktur.struktur', compact('data'));
    }
    public function create(){
        
        return view('admin.struktur.add');
    }
    public function store(PemerintahanStoreRequest $request){
        $data = $request->validated();
        $up = $this->PemerintahanRepository->store($data);
        return $up;
    }
    public function edit(StrukturOrganisasi $id){
        $data = $id;
        return view('admin.struktur.edit', compact('data'));
    }
    public function update(PemerintahanUpdateRequest $request,StrukturOrganisasi $id){
        $up = $this->PemerintahanRepository->update($request,$id);
        return $up;
    }
    public function delete(StrukturOrganisasi $id){
        $id->delete();

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menghapus data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus data');
        }
    }
}
