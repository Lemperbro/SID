<section class="splide py-10" id="umkm">
    <div class="splide__track">
        <ul class="splide__list md:gap-x-4">

            @foreach ($umkm as $item)
                <li class="splide__slide overflow-hidden">
                    <a href="/umkm/view/{{ $item->slug }}" class="relative inline-block w-full">
                        <img src="{{ asset('FtUmkm/' . $item->image) }}" alt=""
                            class="h-[350px] object-cover w-full">
                        <div class="absolute inset-0 bg-black/40">
                            <div
                                class="absolute text-white w-full left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%]">
                                <h1 class="text-center font-semibold text-base md:text-lg xl:text-2xl">{{ $item->judul }}</h1>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</section>


@push('scripts')
    <script>
        var umkm = new Splide('#umkm', {
            type: 'loop',
            perMove: 1,
            perPage: 2,
            autoplay: true,
            pagination: false,
            breakpoints: {
                768: { 
                    perPage: 1,
                },
                1024: { 
                    perPage: 2,
                }
            },
        });

        umkm.mount();
    </script>
@endpush
