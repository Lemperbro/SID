@extends('user.layout.main')

@section('container')
    @include('user.home._jumbotron')
    

    <div class="relative w-full pb-44">
        <div class="absolute left-[50%] -translate-x-[50%] w-full -top-24 z-30">
            <div class="md:container px-4">
                <div class="bg-white rounded-md shadow-ShadowMain p-4">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <a href="/galeri" class="inline-block">
                            <img src="{{ asset('icon/galeri.svg') }}" alt="" class="w-full h-[100px] md:h-[150px]">
                            <h1 class="text-center font-semibold mt-2 text-lg md:text-2xl">Galeri</h1>
                        </a>                                                                    
                        <a href="/program-desa" class="inline-block">
                            <img src="{{ asset('icon/programKerja.svg') }}" alt="" class="w-full h-[100px] md:h-[150px]">
                            <h1 class="text-center font-semibold mt-2 text-lg md:text-2xl">Program Desa</h1>
                        </a>
                        <a href="/berita" class="inline-block">
                            <img src="{{ asset('icon/berita.svg') }}" alt="" class="w-full h-[100px] md:h-[150px]">
                            <h1 class="text-center font-semibold mt-2 text-lg md:text-2xl">Berita</h1>
                        </a>
                        <a href="/umkm" class="inline-block">
                            <img src="{{ asset('icon/umkm.svg') }}" alt="" class="w-full h-[100px] md:h-[150px]">
                            <h1 class="text-center font-semibold mt-2 text-lg md:text-2xl">UMKM</h1>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="md:container mt-20">
            <div class="flex justify-between px-4 md:px-0">
                <h1 class="text-base md:text-xl lg:text-2xl font-semibold">Struktur Pemerintahan</h1>
                <a href="/struktur-pemerintahan" class="inline-block border-b-2 hover:border-black text-sm md:text-base">Lihat Lebih Detail</a>
            </div>
            @include('user.home._strukturPemerintahan')
        </div>
    </div>

    <div>
        <div class="px-4 md:container">
            <div class="flex justify-between">
                <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Berita Terbaru</h1>
                <a href="/berita" class="inline-block border-b-2 hover:border-black text-sm md:text-base">Lihat Selengkapnya</a>
            </div>
            @include('user.home._berita')
        </div>
    </div>
    <div class="bg-main3 py-10">
        <div class="md:container">
            <div class="flex justify-between px-4 md:px-0">
                <h1 class="text-base md:text-xl lg:text-2xl font-semibold text-white">UMKM</h1>
                <a href="/umkm" class="inline-block border-b-2 border-gray-400 hover:border-white text-sm md:text-base text-white">Lihat Selengkapnya</a>
            </div>
            @include('user.home._umkm')
        </div>
    </div>
    <div class="bg-white py-10">
        <div class="md:container px-4">
            <div class="flex justify-between ">
                <h1 class="text-base md:text-xl lg:text-2xl font-semibold text-black">Galeri</h1>
                <a href="/galeri" class="inline-block border-b-2 hover:border-black text-sm md:text-base">Lihat Selengkapnya</a>
            </div>
            @include('user.home._galeri')
        </div>
    </div>

    <div class="px-4 md:container pb-10">
        <h1 class="text-base md:text-xl lg:text-2xl font-semibold text-black text-center">Lokasi Desa Kaligerman</h1>
        <div class="mapouter mb-0 mt-4">
            <div class="gmap_canvas"><iframe width="100%" height="500px" id="gmap_canvas"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10756.20023014508!2d112.31908036726476!3d-6.997889322957296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77ec2fa2828bdb%3A0xa056de29c72e51b2!2sKaligerman%2C%20Kec.%20Karang%20Geneng%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur!5e1!3m2!1sid!2sid!4v1691882828219!5m2!1sid!2sid" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 100%;
                        width: 100%;
                    }
                </style>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 80%;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>

@endsection
