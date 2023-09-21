@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24 pb-10">
        <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Struktur Pemerintahan</h1>
        <p class="text-base md:text-md lg:text-lg">Struktur Pemerintahan Yang Ada Di Desa Kaligerman</p>

        <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach ($data as $item)
                <div
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-80 md:w-44 lg:w-56 md:rounded-none md:rounded-l-lg object-top"
                        src="{{ asset('FtStruktur/'.$item->image) }}" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal w-full md:w-auto text-center md:text-left">
                        <h5 class="mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->nama }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->jabatan }}</p>
                        <div>
                            <h1 class=" font-semibold text-gray-900 text-lg">Masa Jabatan</h1>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->AwalJabat }} - {{ $item->AkhirJabat }}</p>
                        </div>
                    </div>
                </div>
            @endforeach








        </div>
    </div>
@endsection
