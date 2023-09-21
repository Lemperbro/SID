@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Manage Carousel</h1>

        <form action="/admin/carousel/edit/{{ $data['id'] }}" method="POST" id="my-dropzone" enctype="multipart/form-data"
            class=" max-w-6xl mx-auto">
            <div class="my-32">
                <img src="{{ asset('carousel/img/'.$data['image']) }}"
                    alt="" id="previewImage" class="mx-auto w-[300px] h-[200px] object-cover">
            </div>
            @csrf
            <div class="w-full">
                <label for="image"
                    class="bg-white inline-block hover:gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 p-2 w-full text-center text-gray-900 dark:text-white font-semibold rounded-lg @error('image')
                    peer
                @enderror">Ganti
                    Foto</label>
                <input type="file" name="image" id="image" class="hidden" multiple onchange="loadFile(event)">
                @error('image')
                    <p class="peer-invalid:visible text-red-700 font-light">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6 flex gap-x-4">
                <a href="/admin/carousel"
                    class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                <button type="submit"
                    class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
            </div>
        </form>


    </div>
@endsection

@push('scripts')
    <script>
        var inputImage = document.getElementById('image');
        var previewImage = document.getElementById('previewImage');

        inputImage.onchange = evt => {
            const [selectedImage] = inputImage.files;
            previewImage.innerHTML = '';
            if (selectedImage) {
                previewImage.src = URL.createObjectURL(selectedImage);
                previewImage.classList.remove('hidden')
            }
        };
    </script>
@endpush
