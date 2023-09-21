@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Program Kerja - Tambah Program Kerja</h1>

        <div class="my-32">
            <img src="{{ asset('image/'.$data->image) }}" alt="" id="previewImage" class="mx-auto w-[300px] h-[200px] object-cover">
        </div>

        <form action="/admin/program-kerja/edit/{{ $data->slug }}" method="POST" id="my-dropzone" enctype="multipart/form-data"
            class=" max-w-6xl mx-auto">
            @csrf
            <div class="w-full">
                <label for="image"
                    class="bg-white inline-block hover:gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 p-2 w-full text-center text-gray-900 dark:text-white font-semibold rounded-lg @error('image')
                        peer
                    @enderror">Tambah
                    Foto</label>
                <input type="file" name="image" id="image" class="hidden">
                @error('image')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="judul" class="font-semibold text-gray-900 dark:text-white">Judul</label>
                <input type="text" id="judul" name="judul"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('judul')
                        peer
                    @enderror" value="{{ $data->judul }}">
                @error('judul')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center   rounded mt-4 ">
                <input id="bordered-checkbox-1" type="checkbox" value="program unggulan" name="programUnggulan"
                    class="p-2 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" {{ ($data->ProgramKategori !== null) ? 'checked' : '' }}>
                <label for="bordered-checkbox-1"
                    class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Progam Unggulan</label>
            </div>

            <div class="mt-4">
                <label for="deskripsi" class="font-semibold text-gray-900 dark:text-white">Deskripsi Program</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('deskripsi')
                        peer
                    @enderror">
                    {!! $data->deskripsi !!}

                </textarea>
                @error('deskripsi')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6 flex gap-x-4">
                <a href="/admin/program-kerja"
                    class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                <button type="submit"
                    class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script>
        var inputImage = document.getElementById('image');
        var previewImage = document.getElementById('previewImage');

        inputImage.onchange = evt => {
            const [selectedImage] = inputImage.files;
            previewImage.innerHTML= '';
            if (selectedImage) {
                previewImage.src = URL.createObjectURL(selectedImage);
                previewImage.classList.remove('hidden')
            }
        };


        var editor = new FroalaEditor('#deskripsi', {
            contentStyles: {
                'ol': 'list-style-type: decimal;',
                // Tambahkan definisi CSS lain sesuai kebutuhan Anda
            },


            // Konfigurasi unggah gambar
            imageUploadURL: '/uploadImageFroala',
            imageUploadParams: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            imageUploadMethod: 'POST'

        });
    </script>
@endpush
