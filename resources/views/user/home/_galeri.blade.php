<div class="py-10">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($gallery as $item)
        @php
            $image = explode("|", $item->image);
        @endphp
            <a href="/galeri?view={{ $item->slug }}"
                class="inline-block group rounded-lg overflow-hidden hover:scale-95 transition-all duration-500 relative">
                <img class="h-full max-w-full rounded-lg group-hover:scale-150 group-hover:rotate-12 group-hover:cursor-pointer transition-all duration-500 object-cover"
                    src="{{ asset('Galeri/'.$image[0]) }}" alt="">
                    <div class="absolute bg-black/50 inset-0 hidden group-hover:block ">
                        <h1
                            class="text-white font-semibold line-clamp-2 w-full absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] text-2xl text-center">
                            {{ $item->caption }}</h1>
                    </div>
            </a>
        @endforeach

    </div>


</div>
