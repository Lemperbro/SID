@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24">
        <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Umkm Desa Kaligerman</h1>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mt-8 mb-10">
            @include('user.Umkm._card')
        </div>
        {{ $data->links('vendor.pagination.tailwind') }}

    </div>
@endsection
