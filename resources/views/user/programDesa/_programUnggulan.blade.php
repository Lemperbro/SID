<section class="splide " id="program-unggulan">
    <div class="splide__track">
        <ul class="splide__list gap-x-2">

            @foreach ($programUnggulan as $item)
                <li class="splide__slide rounded-lg overflow-hidden">
                    <a href="/program-desa/read/{{ $item->slug }}" class="relative group transition-all duration-500 hover:scale-95 overflow-hidden inline-block">
                        <img src="{{ asset('image/'.$item->image) }}" alt=""
                            class="h-[350px] object-cover w-full rounded-lg group-hover:scale-150 group-hover:rotate-12 transition-all duration-500">
                        <div class="absolute inset-0 bg-black/50">
                            <h1
                                class="text-center font-semibold text-base md:text-lg xl:text-xl absolute top-[50%] -translate-y-[50%] left-[50%] -translate-x-[50%] w-full text-white line-clamp-4 md:line-clamp-3">{{ $item->judul }}</h1>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@push('scripts')
    <script>
        var programUnggulan = new Splide('#program-unggulan', {
            type: 'loop',
            perMove: 1,
            perPage: 4,
            autoplay: true,
            pagination: false,
            breakpoints: {
                768: {
                    perPage: 2,
                },
                1024: {
                    perPage: 3,
                }
            },
        });

        programUnggulan.mount();
    </script>
@endpush
