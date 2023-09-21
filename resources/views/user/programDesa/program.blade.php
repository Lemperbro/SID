@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container pt-24">
        <div class="px-4 md:px-0">
            <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Program Desa</h1>
            <p class="text-base md:text-md lg:text-lg">Program Desa Yang Ada Di Desa Kaligerman</p>
        </div>

        <div class="py-10">
            <h1 class="text-base md:text-xl font-semibold mb-4 px-4 md:px-0">Program Unggulan</h1>
            @include('user.programDesa._programUnggulan')
        </div>
        <div class="px-4 md:px-0">
            <div class="pb-10">
                <h1 class="text-base md:text-xl font-semibold mb-4">Program Lainnya</h1>
                @include('user.programDesa._programLainnya')
            </div>
        </div>
    </div>
@endsection
