@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Umkm - Tambah Umkm</h1>

        <div class="my-32">
            <img src="#" alt="" id="previewImage" class="mx-auto w-[300px] h-[200px] object-cover hidden">
        </div>

        <form action="/admin/umkm/tambah-data" method="POST" id="my-dropzone" enctype="multipart/form-data" class=" max-w-6xl mx-auto">
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
                <label for="nama" class="font-semibold text-gray-900 dark:text-white">Nama Umkm</label>
                <input type="text" id="nama" name="nama"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('nama')
                        peer
                    @enderror">
                @error('nama')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="phone" class="font-semibold text-gray-900 dark:text-white">Nomor Hp</label>
                <input type="number" id="phone" name="phone"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('phone')
                        peer
                    @enderror">
                @error('phone')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="produk" class="font-semibold text-gray-900 dark:text-white">Produk</label>
                <p class="text-gray-700 dark:text-gray-400">*Gunakan <span class="font-bold">|</span> untuk pindah baris</p>
                <textarea id="produk" name="produk"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('produk')
                        peer
                    @enderror">
                </textarea>
                @error('produk')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="isi" class="font-semibold text-gray-900 dark:text-white">Deskripsi Toko</label>
                <textarea name="isi" id="isi"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('isi')
                        peer
                    @enderror">
                </textarea>
                @error('isi')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6 flex gap-x-4">
                <a href="/admin/berita"
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
            if (selectedImage) {
                previewImage.src = URL.createObjectURL(selectedImage);
                previewImage.classList.remove('hidden')
            }
        };


        var editor = new FroalaEditor('#isi', {
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
