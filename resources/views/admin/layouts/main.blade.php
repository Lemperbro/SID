@include('admin.partials.start')

@include('admin.partials.navbar')
<div class="md:flex overflow-hidden bg-gray-200 dark:bg-gray-900">

    @include('admin.partials.sidebar')

    <div id="main-content"
        class="relative overflow-y-auto bg-gray-200 md:ml-64 dark:bg-gray-900 md:container px-4 min-h-screen">
        <main>

            @yield('container')

            <main>


    </div>

</div>
@include('admin.partials.end')
