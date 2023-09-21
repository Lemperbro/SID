<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FroalaController extends Controller
{
    //

    public function uploadImageFroala(Request $request){
        $request->validate([
            'file' => 'required|image|max:2048', // Atur batasan ukuran dan tipe file sesuai kebutuhan
        ]);


        $extension=$request->file('file')->getClientOriginalExtension();
        $name = hash('sha256', time()) . '.' . $extension;
        // Simpan gambar ke storage dengan nama unik
        $uploadedImage = $request->file('file')->move('froala_image',$name);

        // Dapatkan URL gambar yang diunggah
        $imageUrl = asset('froala_image/' . $name);

        // Kembalikan URL gambar sebagai respons
        return response()->json([
            'link' => $imageUrl
        ]);
    }
}
