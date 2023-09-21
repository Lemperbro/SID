@extends('user.layout.main')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24">
        <div class="flex flex-col lg:flex-row gap-5 py-10">
            <div class="w-full flex flex-col gap-4">
                <h1 class="text-base md:text-xl lg:text-2xl  font-semibold">Semua Berita</h1>

                <form action="" class="mb-5">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="cariBerita" name="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-main focus:border-main"
                            placeholder="Cari Berita" value="{{ request('search') }}">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-main font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>


                @foreach ($allBerita as $item)
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
                    <div class="flex flex-col sm:flex-row gap-4 border-b-2 pb-4">
                        <img src="{{ asset('image/' . $item->image) }}" alt=""
                            class="object-cover w-full sm:w-[25%]">
                        <div>
                            <div class="flex gap-x-2 mb-2">
                                <div class="flex gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="mt-[2px] h-[14px] md:h-[1em]"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                    </svg>
                                    <h1 class="text-sm md:text-base">{{ $date }}</h1>
                                </div>
                                <span class="font-bold">|</span>
                                <div class="flex gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="mt-[2px] h-[14px] md:h-[1em]"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg>
                                    <h1 class="text-sm md:text-base">Admin Desa</h1>
                                </div>
                                <span class="font-bold">|</span>
                                <div class="flex gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="mt-[2px] h-[14px] md:h-[1em]"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                    </svg>
                                    <h1 class="text-sm md:text-base">{{ $item->views }}</h1>
                                </div>
                            </div>
                            <h1 class="font-semibold text-base lg:text-lg xl:text-xl line-clamp-2">{{ $item->judul }}</h1>
                            <p class="line-clamp-4 mt-2 text-sm lg:text-base text-justify">{!! $deskripsi !!}</p>
                            <a href="/berita/read/{{ $item->slug }}"
                                class="text-white bg-main p-2 rounded-md mt-2 inline-block text-xs md:text-base">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                @endforeach

                @if ($allBerita->count() < 1)
                    <h1 class="font-semibold text-2xl md:text-3xl text-center">Berita Tidak Ditemukan</h1>
                @endif

                {{ $allBerita->links('vendor.pagination.tailwind') }}



            </div>
            <div class="w-full lg:w-[40%] ">

                <div class="sticky top-24">
                    <div class="mt-5">
                        @include('user.Berita._kategori')
                    </div>

                    <div class="mt-5">
                        @include('user.Berita._beritaFavorit')
                    </div>

                </div>

            </div>
        </div>


        @push('scripts')
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.store('accordion', {
                        tab: 0
                    });

                    Alpine.data('accordion', (idx) => ({
                        init() {
                            this.idx = idx;
                        },
                        idx: -1,
                        handleClick() {
                            this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                        },
                        handleRotate() {
                            return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                        },
                        handleToggle() {
                            return this.$store.accordion.tab === this.idx ?
                                `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                        }
                    }));
                })
            </script>
        @endpush

    </div>
@endsection
