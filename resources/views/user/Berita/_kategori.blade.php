    <h1 class="text-base md:text-xl lg:text-2xl  font-semibold text-center">Kategori Berita</h1>
    <div class="flex flex-wrap gap-4 mt-4">
        <a href="/berita"
            class="inline-block border rounded-md p-2 hover:bg-main hover:text-white capitalize {{ (request('kategori') == null) ? 'bg-main text-white' : '' }}">Semua</a>
        @foreach ($kategoriBerita as $item)
            <a href="/berita?kategori={{ $item->kategori }}"
                class="inline-block border rounded-md p-2 hover:bg-main hover:text-white capitalize {{ (request('kategori') == $item->kategori) ? 'bg-main text-white' : '' }}">{{ $item->kategori }}</a>
        @endforeach

    </div>
