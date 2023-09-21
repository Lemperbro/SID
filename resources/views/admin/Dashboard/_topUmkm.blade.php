<div class="mt-4">
    <h1 class="text-base md:text-xl font-normal text-left text-gray-900 dark:text-white">Umkm Favorit</h1>
    <div class="grid grid-cols-1 gap-4 mt-4">
        @for ($i = 1; $i <= 4; $i++)
            <a href="" class="h-32 w-full inline-block overflow-hidden relative rounded-lg">
                <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]">
                    <h1
                        class="absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] font-semibold text-white text-2xl line-clamp-2">
                        Kopi Tigres</h1>
                </div>
                <img src="{{ asset('defaultImage/bg'.$i.'.jpg') }}" alt="" class="w-full h-full object-cover">
            </a>
        @endfor
    </div>
</div>
