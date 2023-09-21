@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Manage Carousel</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
            @foreach ($imageCarousel as $item)
                <div class="relative">
                    <img src="{{ asset('carousel/img/'.$item['image']) }}" alt="" class="w-full h-full object-cover">

                    <div class="absolute bottom-2 right-2">
                        <a href="/admin/carousel/edit/{{ $loop->iteration }}" class="inline-block bg-lime-600 hover:bg-lime-700 p-2 rounded-lg text-white font-semibold">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="/admin/carousel/edit-tulisan" method="POST" class="mt-10">
            @csrf
            <h1 class="text-center text-gray-900 dark:text-white text-xl md:text-2xl">Edit Text</h1>
            <div class="mt-4">
                <label for="title1" class="text-gray-900 dark:text-white ">Tulisan 1</label>
                <input type="text" id="title1" name="title1" class="p-2 w-full rounded-lg bg-white border dark:bg-gray-700 text-gray-900 dark:text-white mt-2" value="{{ $titleCarousel['title1'] }}">
            </div>

            <div class="mt-4">
                <label for="title2" class="text-gray-900 dark:text-white ">Tulisan 2</label>
                <textarea id="title2" name="title2" class="p-2 w-full rounded-lg bg-white border dark:bg-gray-700 text-gray-900 dark:text-white mt-2">
                    {{ $titleCarousel['title2'] }}
                </textarea>
            </div>
            <button class="text-white bg-lime-600 p-2 rounded-lg mt-4">Simpan</button>
        </form>
    </div>
@endsection
