@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Struktur Pemerintahan - Tambah Data</h1>
        <form action="/admin/struktur-pemerintahan/tambah-data" method="POST" class="mt-10 max-w-6xl mx-auto"
            enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('FtStruktur/ft2.jpg') }}" alt="" class="w-20 h-20 rounded-full object-cover mx-auto">
            <div class="relative mt-10 ">
                <label for="image"
                    class="bg-lime-600 p-2 text-white font-semibold rounded-lg absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] cursor-pointer @error('image')
                        peer
                    @enderror">Masukan
                    Foto</label>
                    @error('image')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
                <input type="file" name="image" id="image" class="hidden">
            </div>

            <div class="mt-20">
                <label for="nama" class=" text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="mt-2 p-2 rounded-lg border-none dark:bg-gray-700 dark:border w-full text-gray-900 dark:text-white @error('nama')
                        peer
                    @enderror">
                @error('nama')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="jabatan" class=" text-gray-900 dark:text-white">Jabatan</label>
                <select name="jabatan" id="jabatan"
                    class="mt-2 p-2 rounded-lg border-none dark:bg-gray-700 dark:border w-full text-gray-900 dark:text-white @error('jabatan')
                        peer
                    @enderror">
                    <option value="kepala desa">Kepala Desa</option>
                    <option value="sekretaris">Sekretaris</option>
                    <option value="kasi pemerintahan">Kasi Pemerintahan</option>
                    <option value="kasi kesejahteraan">Kasi Kesejahteraan</option>
                    <option value="kasi pelayanan">Kasi Pelayanan</option>
                    <option value="kaur usaha">Kaur Usaha</option>
                    <option value="kaur keuangan">Kaur Keuangan</option>
                    <option value="kaur perencanaan">Kaur Perencanaan</option>
                    <option value="kepala dusun">Kepala Dusun</option>
                </select>
                @error('jabatan')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <h1 class="text-gray-900 dark:text-white font-semibold">Masa Jabatan</h1>
                <div class="flex flex-col md:flex-row gap-4 mt-4">
                    <div class="w-full">
                        <label for="masuk" class=" text-gray-900 dark:text-white">Masuk</label>
                        <input type="number" min="1900" step="1" name="masuk" id="masuk"
                            class="mt-2 p-2 rounded-lg border-none dark:bg-gray-700 dark:border w-full text-gray-900 dark:text-white @error('masuk')
                                peer
                            @enderror"
                            placeholder="Contoh : 2005">
                        @error('masuk')
                            <p class="peer-invalid:visible text-red-700 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label for="keluar" class=" text-gray-900 dark:text-white">Keluar</label>
                        <input type="number" step="1" min="1900" name="keluar" id="keluar"
                            class="mt-2 p-2 rounded-lg border-none dark:bg-gray-700 dark:border w-full text-gray-900 dark:text-white @error('keluar')
                                peer
                            @enderror"
                            placeholder="Contoh : 2005">
                            @error('keluar')
                            <p class="peer-invalid:visible text-red-700 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="flex mt-10 gap-x-2">

                <button type="submit"
                    class="inline-block bg-lime-600 hover:bg-lime-700 text-white font-semibold p-2 rounded-lg">Simpan</button>
                <a href="/admin/struktur-pemerintahan"
                    class="inline-block text-white font-semibold p-2 rounded-lg bg-red-600 hover:bg-red-700">Batal</a>
            </div>
        </form>
    </div>
@endsection
