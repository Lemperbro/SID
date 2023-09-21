@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Galeri - Tambah Foto</h1>


        
        <form action="/admin/galeri/tambah-data" method="POST" id="my-dropzone" enctype="multipart/form-data" class=" max-w-6xl mx-auto">
            <div id="previewImage" class="flex gap-x-4 my-32">
            </div>
            @csrf
            <div class="w-full">
                <label for="image"
                    class="bg-white inline-block hover:gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 p-2 w-full text-center text-gray-900 dark:text-white font-semibold rounded-lg @error('image')
                        peer
                    @enderror">Tambah
                    Foto</label>
                <input type="file" name="image[]" id="image" class="hidden" multiple onchange="loadFile(event)">
                @error('image')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="judul" class="font-semibold text-gray-900 dark:text-white">Judul Berita</label>
                <input type="text" id="judul" name="judul"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('judul')
                        peer
                    @enderror">
                @error('judul')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6 flex gap-x-4">
                <a href="/admin/galeri"
                    class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                <button type="submit"
                    class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        var loadFile = function(event) {
            var imgCont = document.getElementById("previewImage");
            for (let i = 0; i < event.target.files.length; i++) {
                var divElm = document.createElement('div');
                divElm.id = "rowdiv" + i;
                var spanElm = document.createElement('span');
                var image = document.createElement('img');
                image.src = URL.createObjectURL(event.target.files[i]);
                image.id = "output" + i;
                image.width = "200";
                spanElm.appendChild(image);
                divElm.appendChild(spanElm);
                imgCont.appendChild(divElm);
            }
        };
    </script>
@endpush
