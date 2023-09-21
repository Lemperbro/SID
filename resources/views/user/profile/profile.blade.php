@extends('user.layout.main')

@section('container')
    <div class="relative">
        <img src="{{ asset('image/'.$data->image) }}" alt="" class="w-full h-[300px] md:h-[380px] object-cover">
        <div class="absolute bg-black/50 inset-0">
            <h1 class="absolute top-[60%] -translate-y-[50%] left-[50%] -translate-x-[50%] font-semibold text-white text-2xl  md:text-3xl w-full text-center">Profile Desa Kaligerman</h1>
        </div>
    </div>
    <div class="min-h-screen md:container px-4 pt-24 pb-20 relative">
        {!! $data->isi !!}
    </div>
@endsection
