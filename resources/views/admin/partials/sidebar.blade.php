<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="/admin" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->is('admin') ? 'bg-gray-100 dark:bg-gray-700' : '' }}  group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white {{ request()->is('admin') ? 'text-gray-900 dark:text-white' : '' }} " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ml-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="/admin/struktur-pemerintahan" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/struktur-pemerintahan') || request()->is('admin/struktur-pemerintahan/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/struktur-pemerintahan') || request()->is('admin/struktur-pemerintahan/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Struktur Pemerintahan</span>
             </a>
          </li>
          <li>
            <a href="/admin/program-kerja" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/program-kerja') || request()->is('admin/program-kerja/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/program-kerja') || request()->is('admin/program-kerja/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Program Kerja</span>
            </a>
         </li>
         <li>
            <a href="/admin/carousel" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/carousel') || request()->is('admin/carousel/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/carousel') || request()->is('admin/carousel/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Edit Carousel</span>
            </a>
         </li>
          <li>
             <a href="/admin/berita" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/kategori-berita') || request()->is('admin/kategori-berita/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/kategori-berita') || request()->is('admin/kategori-berita/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Berita</span>
             </a>
          </li>
          <li>
             <a href="/admin/umkm" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/umkm') || request()->is('admin/umkm/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/umkm') || request()->is('admin/umkm/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0H109.6C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9l-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3V384H128V250.6c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3V384v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V384 252.6c-4 1-8 1.8-12.3 2.3z"/></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Umkm</span>
             </a>
          </li>
          <li>
             <a href="/admin/galeri" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/galeri') || request()->is('admin/galeri/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/galeri') || request()->is('admin/galeri/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Galeri</span>
             </a>
          </li>
          <li>
             <a href="/admin/profile-desa" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('admin/profile-desa') || request()->is('admin/profile-desa/*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="flex-shrink-0 w-5 h-5 fill-gray-500 transition duration-75  group-hover:fill-gray-900 dark:group-hover:fill-white {{ request()->is('admin/profile-desa') || request()->is('admin/profile-desa/*') ? 'fill-gray-900 dark:fill-white' : 'dark:fill-gray-400' }}"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160v8c0 13.3 10.7 24 24 24H456c13.3 0 24-10.7 24-24v-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224H64V420.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512H480c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1V224H384V416H344V224H280V416H232V224H168V416H128V224zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
             </a>
          </li>
          <li>
            <a href="/" class="inline-block items-center p-2 text-gray-900 bg-gray-200 hover:bg-gray-300 rounded-lg dark:text-white dark:bg-gray-700 dark:hover:bg-gray-600 w-full group text-center">
               <span class="text-center whitespace-nowrap font-semibold">Lihat Web</span>
            </a>
         </li>
       </ul>
    </div>
 </aside>