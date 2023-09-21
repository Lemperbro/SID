@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24">
        <div class="w-full flex flex-col gap-4">
            <div class="relative">
                <img src="{{ asset('FtUmkm/' . $data->image) }}" alt="" class="object-cover h-80 w-full">
                <div class="absolute inset-0 bg-black/50">
                    <h1
                        class="font-semibold text-white absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] text-xl md:text-2xl w-full p-10 text-center">
                        {{ $data->judul }}</h1>
                </div>
            </div>

            <p>{!! $data->isi !!}</p>
            <a href="/umkm/redirect/{{ $data->slug }}" target="_blank"
                class="inline-block p-2 bg-main rounded-md text-white text-center font-semibold">Hubungi Penjual</a>

            <div class="py-10">
                <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Umkm Lainnya</h1>
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                    @include('user.Umkm._umkmLainnya')
                </div>
                {{ $umkmLain->links('vendor.pagination.tailwind') }}

            </div>
        </div>
    </div>
@endsection
