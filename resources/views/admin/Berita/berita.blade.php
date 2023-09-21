@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Berita</h1>

        <form class="mt-10" action="/admin/berita">
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

        <div class="flex mt-4 gap-4">
            <a href="/admin/berita/tambah-data"
                class="bg-white hover:bg-gray-100 dark:bg-gray-700 p-2 inline-block dark:hover:bg-gray-600 rounded-lg text-gray-900 dark:text-white font-semibold">Tambah
                Berita</a>
            <a href="/admin/kategori-berita"
                class="bg-white hover:bg-gray-100 dark:bg-gray-700 p-2 inline-block dark:hover:bg-gray-600 rounded-lg text-gray-900 dark:text-white font-semibold">Manage
                Kategori</a>
        </div>

        <div class="flex flex-row overflow-x-auto gap-x-4 mt-8 text-gray-900 dark:text-white w-full py-6">
            <a href="/admin/berita"
                class="border p-2 rounded-xl border-gray-500 hover:bg-main {{ request()->is('admin/berita') && request('admin-berita-kategori') == null ? 'bg-main text-white' : '' }} w-full cursor-pointer min-w-fit sm:w-auto text-center ">Semua
                Berita</a>
            <a href="/admin/berita?admin-berita-kategori=info penting"
                class="border p-2 rounded-xl border-gray-500 hover:bg-main {{ request('admin-berita-kategori') == 'info penting' ? 'bg-main text-white' : '' }} w-full cursor-pointer min-w-fit sm:w-auto text-center ">Info
                Penting</a>
            <a href="/admin/berita?admin-berita-kategori=terlama"
                class="border p-2 rounded-xl border-gray-500 hover:bg-main {{ request('admin-berita-kategori') == 'terlama' ? 'bg-main text-white' : '' }} w-full cursor-pointer min-w-fit sm:w-auto text-center ">Terlama</a>
            <a href="/admin/berita?admin-berita-kategori=terbaru"
                class="border p-2 rounded-xl border-gray-500 hover:bg-main {{ request('admin-berita-kategori') == 'terbaru' ? 'bg-main text-white' : '' }} w-full cursor-pointer min-w-fit sm:w-auto text-center ">Terbaru</a>
            <a href="/admin/berita?admin-berita-kategori=favorit"
                class="border p-2 rounded-xl border-gray-500 hover:bg-main {{ request('admin-berita-kategori') == 'favorit' ? 'bg-main text-white' : '' }} w-full cursor-pointer min-w-fit sm:w-auto text-center ">Favorit</a>
        </div>


        <div class="mt-10 grid grid-cols-1 gap-y-4">

            @foreach ($data as $item)
                @php
                    $date = Carbon\Carbon::parse($item->created_at)
                        ->locale('id')
                        ->isoFormat('D MMMM YYYY');
                    
                    $dom = new DOMDocument();
                    $dom->loadHTML($item->isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    
                    $images = $dom->getElementsByTagName('img');
                    foreach ($images as $image) {
                        $image->parentNode->removeChild($image);
                    }
                    
                    // Menghapus elemen <br>
                    $lineBreaks = $dom->getElementsByTagName('br');
                    foreach ($lineBreaks as $lineBreak) {
                        $lineBreak->parentNode->removeChild($lineBreak);
                    }
                    
                    $deskripsi = $dom->saveHTML();
                    $deskripsi = strip_tags($deskripsi, '<br>');
                @endphp
                <div
                    class="flex flex-col sm:flex-row gap-4 border-b-2 pb-4 bg-white dark:bg-gray-700 p-4 rounded-lg dark:border-none">
                    <img src="{{ asset('image/' . $item->image) }}" alt="" class="object-cover w-full sm:w-[25%]">
                    <div>
                        <div class="flex gap-x-2 mb-2">
                            <div class="flex gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="mt-[2px] h-[14px] md:h-[1em] fill-gray-900 dark:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                </svg>
                                <h1 class="text-sm md:text-base text-gray-900 dark:text-white">{{ $date }}</h1>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">|</span>
                            <div class="flex gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    class="mt-[2px] h-[14px] md:h-[1em] fill-gray-900 dark:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                </svg>
                                <h1 class="text-sm md:text-base text-gray-900 dark:text-white">Admin Desa</h1>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">|</span>
                            <div class="flex gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="mt-[2px] h-[14px] md:h-[1em] fill-gray-900 dark:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                </svg>
                                <h1 class="text-sm md:text-base text-gray-900 dark:text-white">{{ $item->views }}</h1>
                            </div>
                        </div>
                        <h1
                            class="font-semibold text-base lg:text-lg xl:text-xl line-clamp-2 text-gray-900 dark:text-white">
                            {{ $item->judul }}</h1>
                        <div class="line-clamp-4 mt-2 text-sm lg:text-base text-justify text-gray-900 dark:text-white">
                            {!! $deskripsi !!}
                        </div>
                        <h1 class="mt-4 text-gray-900 dark:text-white font-semibold capitalize">Kategori :
                            {{ $item->beritaKategori->kategori }}</h1>
                        <a href="/berita/read/{{ $item->slug }}"
                            class="text-white bg-main p-2 rounded-md mt-2 inline-block text-xs md:text-base">Baca
                            Selengkapnya</a>
                        <div class="flex gap-x-4 mt-5">
                            <a href="/admin/berita/edit/{{ $item->id }}"
                                class="p-2 rounded-lg bg-lime-600 hover:bg-lime-700 font-semibold inline-block text-white">Edit</a>
                            <button class="p-2 rounded-lg bg-red-600 hover:bg-red-700 font-semibold inline-block text-white"
                                onclick="delete_{{ $item->id }}.showModal()">Hapus</button>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
        {{ $data->links('vendor.pagination.tailwind') }}


    </div>
@endsection


@foreach ($data as $delete)
    <dialog id="delete_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle ">
        <form action="/admin/berita/hapus/{{ $delete->id }}" method="POST"
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
