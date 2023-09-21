@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24">
        <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Galeri Desa Kaligerman</h1>
        @if ($view !== null)
            @php
                $image = explode('|', $view->image);
                $date = Carbon\Carbon::parse($view->created_at)
                    ->locale('id')
                    ->isoFormat('D MMMM YYYY');
            @endphp

            @if (count($image) > 1)
                <div class="py-10 border-b-2">
                    @include('user.galeri._carousel')
                </div>
            @elseif (count($image) == 1)
                <div class="relative h-96 overflow-hidden rounded-lg md:h-[800px]">
                    <img src="{{ asset('Galeri/' . $image[0]) }}" class=" block w-full h-full object-cover" alt="...">
                </div>
            @endif
        @endif
        <div class="py-10">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                @foreach ($data as $item)
                    @php
                        $image = explode('|', $item->image);
                    @endphp
                    <a href="/galeri?view={{ $item->slug }}"
                        class="inline-block group rounded-lg overflow-hidden hover:scale-95 transition-all duration-500 relative">
                        <img class="h-full max-w-full rounded-lg group-hover:scale-150 group-hover:rotate-12 group-hover:cursor-pointer transition-all duration-500 {{ request('view') !== null && request('view') == $item->slug ? 'border-[3px] border-blue-400' : '' }} object-cover"
                            src="{{ asset('Galeri/' . $image[0]) }}" alt="">
                        <div class="absolute bg-black/50 inset-0 hidden group-hover:block ">
                            <h1
                                class="text-white font-semibold line-clamp-2 w-full absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] text-base md:text-lg lg:text-xl xl:text-2xl text-center">
                                {{ $item->caption }}</h1>
                        </div>
                    </a>
                @endforeach

            </div>
            {{ $data->links('vendor.pagination.tailwind') }}



        </div>

    </div>
@endsection
