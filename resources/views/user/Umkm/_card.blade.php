@foreach ($data as $item)
    @php
        $produk = explode('|', $item->produk);
    @endphp
    <a href="/umkm/view/{{ $item->slug }}"
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full md:w-48 h-full " src="{{ asset('FtUmkm/' . $item->image) }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal w-full">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->judul }}</h5>
            <h3 class="font-semibold">Produk</h3>
            <ul class="list-none">
                @foreach ($produk as $produks)
                    <li>- {{ $produks }}</li>
                @endforeach

            </ul>
            <h1 class="text-main mt-4">Lihat Selengkapnya</h1>
        </div>
    </a>
@endforeach
