@extends('admin.layouts.main')


@section('container')
<div class="pt-24 pb-20">
    <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Kategori - Edit Kategori</h1>

    <form action="/admin/kategori-berita/edit/{{ $data->id }}" method="POST" class="max-w-6xl mx-auto mt-20">
        @csrf
        <div>
            <label for="kategori" class="text-gray-900 dark:text-white">Masukan Kategori</label>
            <input type="text" name="kategori" id="kategori" class="mt-2 w-full p-2 rounded-lg border-none bg-white text-gray-900 dark:bg-gray-700 dark:text-white @error('kategori')
                peer
            @enderror" value="{{ $data->kategori }}">
            @error('kategori')
            <p class="peer-invalid:visible text-red-700 font-light">
                {{ $message }}
            </p>
        @enderror
        </div>
        <div class="flex gap-x-4 mt-6">
            <a href="/admin/kategori-berita" class="p-2 rounded-lg bg-red-600 font-semibold text-white">Batal</a>
            <button type="submit" class="p-2 rounded-lg bg-lime-600 font-semibold text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection