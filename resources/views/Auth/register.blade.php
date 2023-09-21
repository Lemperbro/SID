@extends('user.layout.main2')

@section('container')
    <div class="min-h-screen md:container px-4 pt-24">
        <div class="flex items-center pt-8 mx-auto justify-center">
            <img src="{{ asset('icon/lamongan.png') }}" class="w-14 h-14 object-contain mr-3" />
            <div class="flex flex-col">
                <span class=" text-2xl font-semibold whitespace-nowrap dark:text-white">Desa Kaligerman</span>
                <span class=" text-base font-normal whitespace-nowrap dark:text-white">Kabupaten Lamongan</span>
            </div>
        </div>


        <form action="/register" method="POST"
            class="shadow-xl rounded-lg px-4 py-10 max-w-xl absolute left-[50%] -translate-x-[50%] top-[50%] -translate-y-[50%] w-full mt-4">
            @csrf


            <h1 class="font-semibold text-center text-2xl mb-4">Register</h1>


            @if (session()->has('RegisterSuccess'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('RegisterSuccess') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @elseif (session()->has('RegisterFailed'))
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('RegisterFailed') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session()->has('LoginError'))
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('LoginError') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif


            <div class="mt-5">
                <label for="email" class="font-semibold text-lg">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-2 w-full rounded-md bg-gray-200 p-2 border-none focus:outline-main4 focus:outline-1 focus:ring-0 @error('email') peer @enderror"
                    placeholder="Example@gmail.com">
                @error('email')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="username" class="font-semibold text-lg">Username</label>
                <input type="text" id="username" name="username"
                    class="mt-2 w-full rounded-md bg-gray-200 p-2 border-none focus:outline-main4 focus:outline-1 focus:ring-0 @error('username') peer @enderror"
                    placeholder="Ryan Yulianto">
                @error('username')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password" class="font-semibold text-lg">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full mt-2 rounded-md bg-gray-200 p-2 border-none focus:outline-main4 focus:outline-1 focus:ring-0 @error('password') peer @enderror"
                    placeholder="*********">
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password_confirmation" class="font-semibold text-lg">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full mt-2 rounded-md bg-gray-200 p-2 border-none focus:outline-main4 focus:outline-1 focus:ring-0 @error('password') peer @enderror"
                    placeholder="*********">
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-2">
                <label for="phone" class="font-semibold text-lg">Nomor Telphone</label>
                <input type="text" id="phone" name="phone"
                    class="mt-2 w-full rounded-md bg-gray-200 p-2 border-none focus:outline-main4 focus:outline-1 focus:ring-0 @error('phone') peer @enderror"
                    placeholder="082230736205">
                @error('phone')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-main p-2 rounded-md font-semibold text-center block w-full mt-10">Kirim</button>
        </form>

    </div>
@endsection
