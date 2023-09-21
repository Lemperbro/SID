
<footer class="bg-main5" id="footer">
    <div class="w-full mx-auto p-4 md:container md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('icon/lamongan.png') }}" class="h-10 mr-3" />
                <div class="flex flex-col">
                    <span class="text-left text-2xl font-semibold whitespace-nowrap text-white">Desa Kaligerman</span>
                    <span class="text-left text-lg font-normal whitespace-nowrap text-white">Kabupaten Lamongan</span>
                </div>
            </a>
            </div>
            <div class="flex flex-wrap gap-4 items-center mb-6 text-sm font-medium text-white sm:mb-0">
                <div class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] my-auto fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <h1 class="my-auto">{{ $info->email }}</h1>
                </div>
                <div class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] my-auto fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <h1 class="my-auto">+62{{ $info->phone }}</h1>
                </div>
                <a href="https://goo.gl/maps/F3k4z7GDFNzFLbF2A" target="_blank" class="flex gap-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[18px] my-auto fill-white"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <h1 class="my-auto">Lokasi Desa</h1>
                </a>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-white sm:text-center">© 2023 Website By KKN PAR 2023 <a href="https://billfath.ac.id" class="font-semibold">Universitas Billfath</a></span>
    </div>
</footer>

