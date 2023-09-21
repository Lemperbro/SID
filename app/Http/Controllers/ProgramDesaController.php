<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramCreateRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\ProgramDesa;
use App\Repositories\ProgramDesaRepository;
use Exception;
use Illuminate\Http\Request;

class ProgramDesaController extends Controller
{
    //
    private $ProgramDesaRepository;

    public function __construct()
    {
        $this->ProgramDesaRepository = new ProgramDesaRepository();
    }

    public function index(){
        $programUnggulan = $this->ProgramDesaRepository->programUnggulan(10);
        $programLainnya = $this->ProgramDesaRepository->programLainnya(12);

        return view('user.programDesa.program', compact('programUnggulan','programLainnya'));
    }

    public function adminIndex(){
        $data = $this->ProgramDesaRepository->getAll(8);

        return view('admin.Program.program', compact('data'));
    }

    public function create(){
        return view('admin.Program.add');
    }

    public function store(ProgramCreateRequest $request){
        $up = $this->ProgramDesaRepository->create($request);
        return $up;
    }

    public function edit(ProgramDesa $id){
        $data = $id;
        return view('admin.Program.edit', compact('data'));
    }
    public function update(ProgramUpdateRequest $request, ProgramDesa $id){
        $up = $this->ProgramDesaRepository->update($request, $id);

        return $up;
    }

    public function delete(ProgramDesa $id){
        $id->delete();

        try{
            return redirect()->back()->with('toast_success', 'Berhasil menghapus data');
        }catch(Exception $e){
            return redirect()->back()->with('toast_error', 'Tidak berhasil menghapus data');
        }
    }

    public function read(ProgramDesa $id){
        $data = $id;

        return view('user.programDesa.read',compact('data'));
    }

}
