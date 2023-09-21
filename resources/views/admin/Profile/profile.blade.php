@extends('admin.layouts.main')

@section('container')
    <div class="pt-24 pb-20">
        <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Profile Desa</h1>

        @if ($data == null)
            <form action="/admin/profile/add" method="POST" id="my-dropzone" enctype="multipart/form-data"
                class=" max-w-6xl mx-auto">
                <div id="previewImage" class="flex gap-x-4 my-32">
                </div>
                @csrf
                <div class="w-full">
                    <label for="image"
                        class="bg-white inline-block hover:gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 p-2 w-full text-center text-gray-900 dark:text-white font-semibold rounded-lg @error('image')
                        peer
                    @enderror">Tambah
                        Foto</label>
                    <input type="file" name="image" id="image" class="hidden" onchange="loadFile(event)">
                    @error('image')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="profile" class="font-semibold text-gray-900 dark:text-white mb-4">Profile Desa</label>
                    <textarea id="profile" name="profile"
                        class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full text-gray-900 dark:text-white @error('profile')
                        peer
                    @enderror">
                    </textarea>
                    @error('profile')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-6 flex gap-x-4">
                    <a href="/admin"
                        class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                    <button type="submit"
                        class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
                </div>
            </form>
            
        @elseif ($data !== null)
            <form action="/admin/profile/edit/{{ $data->id }}" method="POST" id="my-dropzone" enctype="multipart/form-data"
                class=" max-w-6xl mx-auto">
                <div id="previewImage" class="flex gap-x-4 my-32">
                    <img src="{{ asset('image/' . $data->image) }}" alt="">
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

                <div class="mt-4">
                    <label for="profile" class="font-semibold text-gray-900 dark:text-white mb-4">Profile Desa</label>
                    <textarea id="profile" name="profile"
                        class="p-2 bg-white hover:bg-gray-100 border-none dark:bg-gray-700 dark:hover:bg-gray-600 rounded-lg w-full text-gray-900 dark:text-white @error('profile')
                peer
            @enderror">
            {!! $data->isi !!}
            </textarea>
                    @error('profile')
                        <p class="peer-invalid:visible text-red-700 font-light">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-6 flex gap-x-4">
                    <a href="/admin"
                        class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-2 font-semibold">Batal</a>
                    <button type="submit"
                        class="text-white font-semibold bg-lime-600 hover:bg-lime-500 p-2 rounded-lg ">Simpan</button>
                </div>
            </form>
        @endif
    </div>
@endsection


@push('scripts')
    <script>
        var loadFile = function(event) {
            var imgCont = document.getElementById("previewImage");
            imgCont.innerHTML = '';
            for (let i = 0; i < event.target.files.length; i++) {
                var divElm = document.createElement('div');
                divElm.id = "rowdiv" + i;
                var spanElm = document.createElement('span');
                var image = document.createElement('img');
                image.src = URL.createObjectURL(event.target.files[i]);
                image.id = "output" + i;
                spanElm.appendChild(image);
                divElm.appendChild(spanElm);
                imgCont.appendChild(divElm);
            }
        };

        var editor = new FroalaEditor('#profile', {
            contentStyles: {
                'ol': 'list-style-type: decimal;',
                // Tambahkan definisi CSS lain sesuai kebutuhan Anda
            },


            // Konfigurasi unggah gambar
            imageUploadURL: '/uploadImageFroala',
            imageUploadParams: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            imageUploadMethod: 'POST'

        });
    </script>
@endpush
