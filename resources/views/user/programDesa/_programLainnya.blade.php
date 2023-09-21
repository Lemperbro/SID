<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($programLainnya as $item)
        <a href="/program-desa/read/{{ $item->slug }}"
            class="relative rounded-lg h-72 cursor-pointer group transition-all duration-500 hover:scale-95 overflow-hidden">
            <img src="{{ asset('image/'.$item->image) }}" alt=""
                class="w-full h-full object-cover rounded-lg group-hover:scale-150 group-hover:rotate-12 transition-all duration-500">
            <div class="absolute  inset-0 group-hover:bg-black/30">
                <div class=" px-2 bottom-2 absolute w-full z-20">
                    <div class=" bg-black/40 group-hover:bg-white/50 backdrop-blur-md p-2 rounded-lg">
                        <h1 class="font-semibold line-clamp-3 text-white group-hover:text-black">{{ $item->judul }}</h1>
                    </div>
                </div>
            </div>
        </a>
    @endforeach

</div>

{{ $programLainnya->links('vendor.pagination.tailwind') }}
