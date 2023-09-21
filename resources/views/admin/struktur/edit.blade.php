@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Struktur Pemerintahan - Edit</h1>
        <form action="/admin/struktur-pemerintahan/edit/{{ $data->id }}" method="POST" class="mt-10 max-w-6xl mx-auto"
            enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('FtStruktur/' . $data->image) }}" alt=""
                class="w-20 h-20 rounded-full object-cover mx-auto">
            <div class="relative mt-10 ">
                <label for="image"
                    class="bg-lime-600 p-2 text-white font-semibold rounded-lg absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] cursor-pointer @error('image')
                peer
            @enderror">Ubah
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
                    @enderror"
                    value="{{ $data->nama }}">
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
                    <option value="kepala desa" {{ $data->jabatan == 'kepala desa' ? 'selected' : '' }}>Kepala Desa
                    </option>
                    <option value="sekretaris" {{ $data->jabatan == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                    <option value="kasi pemerintahan" {{ $data->jabatan == 'kasi pemerintahan' ? 'selected' : '' }}>Kasi
                        Pemerintahan</option>
                    <option value="kasi kesejahteraan" {{ $data->jabatan == 'kasi kesejahteraan' ? 'selected' : '' }}>Kasi
                        Kesejahteraan</option>
                    <option value="kasi pelayanan" {{ $data->jabatan == 'kasi pelayanan' ? 'selected' : '' }}>Kasi
                        Pelayanan</option>
                    <option value="kaur usaha" {{ $data->jabatan == 'kaur usaha' ? 'selected' : '' }}>Kaur Usaha</option>
                    <option value="kaur keuangan" {{ $data->jabatan == 'kaur keuangan' ? 'selected' : '' }}>Kaur Keuangan
                    </option>
                    <option value="kaur perencanaan" {{ $data->jabatan == 'kaur perencanaan' ? 'selected' : '' }}>Kaur
                        Perencanaan</option>
                    <option value="kepala dusun" {{ $data->jabatan == 'kepala dusun' ? 'selected' : '' }}>Kepala Dusun
                    </option>
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
                            placeholder="Contoh : 2005" value="{{ $data->AwalJabat }}">
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
                            placeholder="Contoh : 2005" value="{{ $data->AkhirJabat }}">
                            @error('keluar')
                            <p class="peer-invalid:visible text-red-700 font-light">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </div>

            <button
                class="inline-block bg-lime-600 hover:bg-lime-700 text-white font-semibold p-2 rounded-lg mt-10">Simpan</button>
        </form>
    </div>
@endsection
