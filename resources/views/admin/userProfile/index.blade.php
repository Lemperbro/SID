@extends('admin.layouts.main')


@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Edit Profile</h1>

        <form action="/admin/user/profile" method="POST" id="my-dropzone" enctype="multipart/form-data" class=" max-w-6xl mx-auto mt-32">
            @csrf
            <div class="">
                <label for="username" class="font-semibold text-gray-900 dark:text-white">Username</label>
                <input type="text" id="username" name="username"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('username')
                        peer
                    @enderror" value="{{ $data->username }}">
                @error('username')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="font-semibold text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('email')
                        peer
                    @enderror" value="{{ $data->email }}">
                @error('email')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="phone" class="font-semibold text-gray-900 dark:text-white">Phone</label>
                <input type="number" id="phone" name="phone"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('phone')
                        peer
                    @enderror" value="{{ $data->phone }}">
                @error('phone')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <h1 class="text-gray-900 dark:text-white text-2xl mt-8">Manage Password</h1>
            <div class="mt-4">
                <label for="password" class="font-semibold text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('password')
                        peer
                    @enderror">
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="font-semibold text-gray-900 dark:text-white">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full mt-2 text-gray-900 dark:text-white @error('password')
                        peer
                    @enderror">
                @error('password')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6 flex gap-x-4">
                <a href="/admin/berita"
                    class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                <button type="submit"
                    class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
            </div>
        </form>
    </div>
@endsection
