<section class="splide py-10" id="struktur">
    <div class="splide__track">
        <ul class="splide__list gap-x-2">

            @foreach ($pemerintahan as $item)
                <li class="splide__slide rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('FtStruktur/' . $item->image) }}" alt=""
                            class="h-[350px] object-cover w-full rounded-lg">
                        <div class="absolute inset-0 ">
                            <div
                                class="absolute pb-2 pt-24 bottom-0 text-white bg-gradient-to-t from-black w-full left-[50%] -translate-x-[50%]">
                                <h1 class="text-center font-semibold text-base md:text-lg xl:text-xl">{{ $item->nama }}</h1>
                                <p class="text-center text-xs md:text-sm xl:text-base">{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</section>


@push('scripts')
    <script>
        var struktur = new Splide('#struktur', {
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

        struktur.mount();
    </script>
@endpush
