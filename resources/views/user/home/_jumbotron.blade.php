<div id="default-carousel" class="relative w-full h-screen" data-carousel="slide">
    {{-- isi --}}
    <div class="">
        <div class="absolute z-30 inset-0 bg-black/50 ">
            <div class="md:container">
                <div class="absolute top-[50%] -translate-y-[50%] md:w-[70%] xl:w-[50%]">
                    <div class="px-4">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white">{{ $titleCarousel['title1'] }}
                        </h1>
                        <p class="text-lg md:text-xl font-medium text-gray-300 mt-4">{{ $titleCarousel['title2'] }}</p>
                        <a href="#footer"
                            class="py-3 px-3 rounded-md bg-main text-white inline-block font-semibold mt-4">Hubungi
                            Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden h-screen">
        @foreach ($imageCarousel as $item)
            <!-- Item -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('carousel/img/'.$item['image']) }}" class="h-screen w-full object-cover" alt="...">
            </div>
        @endforeach

    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @foreach ($imageCarousel as $item) 
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}"
                data-carousel-slide-to="{{ $loop->iteration - 1 }}"></button>
        @endforeach
    </div>
</div>
