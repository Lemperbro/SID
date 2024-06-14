@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Struktur Pemerintahan</h1>


        <form class="mt-10" action="/admin/struktur-pemerintahan">
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
                    placeholder="Cari Data" value="{{ request('search') }}">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-main hover:bg-main focus:ring-4 focus:outline-none focus:ring-main font-medium rounded-lg text-sm px-4 py-2 dark:bg-main dark:hover:bg-main dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="flex mt-10">
            <a href="/admin/struktur-pemerintahan/tambah-data"
                class="p-2 bg-white hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 flex gap-x-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"
                    class="my-auto fill-gray-900 dark:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
                <span class="my-auto text-gray-900 dark:text-white">Tambah Data</span>
            </a>
        </div>
       
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">

            @foreach ($data as $item)
                <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <img class="rounded-t-lg w-full h-60 object-cover" style="object-position: 50% 20%;" src="{{ asset('FtStruktur/' . $item->image) }}"
                            alt="" />
                    </div>
                    <div class="p-5">
                        <div>
                            <h5
                                class="text-lg md:text-xl  lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->nama }}</h5>
                            <p class="text-gray-900 dark:text-white">{{ $item->jabatan }}</p>
                        </div>
                        <div class="mt-4">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Masa Jabatan</p>
                            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $item->AwalJabat }} -
                                {{ $item->AkhirJabat }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 p-2">
                        <a href="/admin/struktur-pemerintahan/edit/{{ $item->id }}"
                            class="inline-block bg-lime-600 hover:bg-lime-500 text-white font-semibold p-2 text-center rounded-lg">Edit</a>
                        <button
                            class="inline-block bg-red-600 hover:bg-red-500 text-white font-semibold p-2 text-center rounded-lg"
                            onclick="delete_{{ $item->id }}.showModal()">Hapus</button>
                    </div>
                </div>
            @endforeach

        </div>
        {{ $data->links('vendor.pagination.tailwind') }}

    </div>
@endsection


<!-- Open the modal using ID.showModal() method -->
@foreach ($data as $delete)
    <dialog id="delete_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle ">
        <form action="/admin/struktur-pemerintahan/hapus/{{ $delete->id }}" method="POST"
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
