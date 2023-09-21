@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Umkm</h1>

        <form class="mt-10" action="/admin/umkm">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-main focus:border-main dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-main dark:focus:border-main"
                    placeholder="Cari Berita" value="{{ request('search') }}">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-main hover:bg-main focus:ring-4 focus:outline-none focus:ring-main font-medium rounded-lg text-sm px-4 py-2 dark:bg-main dark:hover:bg-main dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <a href="/admin/umkm/tambah-data"
            class="bg-white dark:bg-gray-700 p-2 border-none text-gray-900 dark:text-white mt-10 rounded-lg inline-block">Tambah
            Umkm</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

            @foreach ($data as $item)
                @php
                    $produk = explode('|', $item->produk);
                @endphp
                <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <img class="rounded-t-lg w-full h-56 object-cover" src="{{ asset('FtUmkm/' . $item->image) }}"
                            alt="" />
                    </div>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->judul }}</h5>
                        </a>
                        <div class="mb-2">
                            @foreach ($produk as $produks)
                                <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">- {{ $produks }}</p>
                            @endforeach
                        </div>
                        <div class="flex gap-x-4">
                            <a href="/admin/umkm/edit/{{ $item->slug }}" class="text-lime-600">Edit</a>
                            <button class="text-red-600" onclick="delete_{{ $item->id }}.showModal()">Hapus</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data->links('vendor.pagination.tailwind') }}

        @if ($data->count() < 1)
            <h1 class="text-2xl md:text-3xl text-gray-900 dark:text-white font-semibold text-center">Data tidak ditemukan
            </h1>
        @endif
    </div>
@endsection


@foreach ($data as $delete)
    <dialog id="delete_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle ">
        <form action="/admin/umkm/hapus/{{ $delete->slug }}" method="POST"
            class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
            @csrf
            <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
            <div class="modal-action">
                <label for="closeDelete{{ $delete->id }}"
                    class="btn bg-red-600 hover:bg-red-700 border-none">Tidak</label>
                <button class="btn bg-lime-600 hover:bg-lime-700 border-none">Hapus</button>
            </div>
        </form>
        <form method="dialog" class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white hidden">
            <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn" id="closeDelete{{ $delete->id }}">Close</button>
            </div>
        </form>
    </dialog>
@endforeach
