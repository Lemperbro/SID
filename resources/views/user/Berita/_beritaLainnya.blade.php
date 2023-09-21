@foreach ($beritaLain as $item)
    @php
        $date = Carbon\Carbon::parse($item->created_at)
            ->locale('id')
            ->isoFormat('D MMMM YYYY');
        
        $dom = new DOMDocument();
        $dom->loadHTML($item->isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $image->parentNode->removeChild($image);
        }
        
        // Menghapus elemen <br>
        $lineBreaks = $dom->getElementsByTagName('br');
        foreach ($lineBreaks as $lineBreak) {
            $lineBreak->parentNode->removeChild($lineBreak);
        }
        
        $deskripsi = $dom->saveHTML();
        $deskripsi = strip_tags($deskripsi, '<br>');
    @endphp
    <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg object-cover w-full h-56" src="{{ asset('image/' . $item->image) }}" alt="" />
        </a>
        <div class="p-5">

            <div class="flex gap-x-2 mb-2">
                <div class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="mt-[2px] h-[14px] group-hover:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                    </svg>
                    <h1 class="text-sm">{{ $date }}</h1>
                </div>
                <span class="font-bold">|</span>
                <div class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="mt-[2px] h-[14px] group-hover:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <h1 class="text-sm">Admin Desa</h1>
                </div>
                <span class="font-bold">|</span>
                <div class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="mt-[2px] h-[14px] group-hover:fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                    </svg>
                    <h1 class="text-sm">{{ $item->views }}</h1>
                </div>

            </div>

            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">{{ $item->judul }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{!! $deskripsi !!}</p>
            <a href="/berita/read/{{ $item->slug }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-main rounded-lg focus:ring-4 focus:outline-none">
                Baca Selengkapnya
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
@endforeach
