<nav class="bg-white/40 backdrop-blur-md  border-gray-200 dark:bg-gray-900 dark:border-gray-700 fixed z-40 w-full">
    <div class="md:container flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/login" class="flex items-center">
            <img src="{{ asset('icon/lamongan.png') }}" class="w-14 h-14 object-contain mr-3" />
            <div class="flex flex-col">
                <span class=" text-2xl font-semibold whitespace-nowrap dark:text-white">Desa Kaligerman</span>
                <span class=" text-base font-normal whitespace-nowrap dark:text-white">Kabupaten Lamongan</span>
            </div>
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 bg-white/50 backdrop-blur-sm"
            aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full lg:block lg:w-auto" id="navbar-multi-level">
            <ul
                class="flex flex-col p-4 lg:p-0 mt-4 rounded-lg bg-gray-50/60 lg:flex-row lg:space-x-8 lg:mt-0 lg:border-0 lg:bg-white/0 font-semibold list-none">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 lg:hover:bg-transparent {{ request()->is('/') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }} lg:hover:text-main lg:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/struktur-pemerintahan"
                        class="block py-2 pl-3 pr-4 rounded  lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('struktur-pemerintahan') || request()->is('struktur-pemerintahan/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">Struktur Pemerintahan</a>
                </li>
                <li>
                    <a href="/program-desa"
                        class="block py-2 pl-3 pr-4 rounded  lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('program-desa') || request()->is('program-desa/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">Program Desa</a>
                </li>
                <li>
                    <a href="/berita"
                        class="block py-2 pl-3 pr-4 rounded lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('berita') || request()->is('berita/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">Berita</a>
                </li>
                <li>
                    <a href="/umkm"
                        class="block py-2 pl-3 pr-4 rounded lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('umkm') || request()->is('umkm/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">UMKM</a>
                </li>
                <li>
                    <a href="/galeri"
                        class="block py-2 pl-3 pr-4 rounded  lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('galeri') || request()->is('galeri/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">Galeri</a>
                </li>
                <li>
                    <a href="/profile"
                        class="block py-2 pl-3 pr-4 rounded lg:hover:bg-transparent lg:border-0 lg:hover:text-main lg:p-0 {{ request()->is('profile') || request()->is('profile/*') ? 'text-white bg-main rounded lg:bg-transparent lg:text-main' : 'hover:bg-gray-100 text-gray-900' }}">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
