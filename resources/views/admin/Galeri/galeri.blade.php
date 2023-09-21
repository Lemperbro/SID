@extends('admin.layouts.main')

@section('container')
    <div class="pb-20 pt-24">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Galeri</h1>

        <form class="mt-10" action="/admin/galeri">
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


        <div class="py-10">
            <a href="/admin/galeri/tambah-data"
                class="bg-white dark:bg-gray-700 p-2 border-none text-gray-900 dark:text-white rounded-lg mb-4 inline-block">Tambah
                Foto</a>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                @foreach ($data as $item)
                    @php
                        $image = explode('|', $item->image);
                    @endphp
                    <div class="relative group rounded-lg overflow-hidden hover:scale-95 transition-all duration-500">
                        <a href="/galeri?view={{ $item->slug }}" class="inline-block rounded-lg relative w-full h-full">
                            <img class="h-full max-w-full rounded-lg group-hover:scale-150 group-hover:rotate-12 group-hover:cursor-pointer transition-all duration-500 object-cover"
                                src="{{ asset('Galeri/' . $image[0]) }}" alt="">
                            <div class="absolute bg-black/50 inset-0 hidden group-hover:block ">
                                <h1
                                    class="text-white font-semibold line-clamp-2 w-full absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] text-2xl text-center">
                                    {{ $item->caption }}</h1>
                            </div>
                        </a>
                        <div class="absolute bottom-2 right-2 flex gap-x-4 bg-black/60 p-4 rounded-lg">
                            <button class="p-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg"
                                onclick="delete_{{ $item->id }}.showModal()">
                                Hapus
                            </button>
                            <a href="/admin/galeri/edit/{{ $item->slug }}"
                                class="inline-block p-2 bg-lime-600 hover:bg-lime-700 text-white font-semibold rounded-lg">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $data->links('vendor.pagination.tailwind') }}



        </div>

    </div>
@endsection


@foreach ($data as $delete)
    <dialog id="delete_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle ">
        <form action="/admin/galeri/hapus/{{ $delete->slug }}" method="POST"
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
