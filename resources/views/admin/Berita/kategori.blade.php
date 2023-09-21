@extends('admin.layouts.main')

@section('container')
<div class="pt-24 pb-20">
    <h1 class="text-gray-900 dark:text-white font-semibold text-xl">Kategori Berita</h1>

    <div class="flex mt-10">
        <a href="/admin/kategori-berita/add" class="inline-block bg-lime-600 p-2 rounded-lg font-semibold text-gray-900 dark:text-white">Tambah Kategori</a>
    </div>

    <div class="flex flex-wrap gap-4 mt-10">
        @foreach ($data as $item) 
            <div class="bg-white border-none dark:bg-gray-700 p-2 rounded-lg">
                <h1 class="font-semibold text-gray-900 dark:text-white text-3xl capitalize">{{ $item->kategori }}</h1>
                @if($item->kategori !== 'info penting')
                <div class="flex gap-x-2 mx-auto justify-center">
                    <a href="/admin/kategori-berita/edit/{{ $item->id }}" class="text-lime-600">Edit</a>
                    <button class="text-red-600" onclick="delete_{{ $item->id }}.showModal()">Hapus</button>
                </div>
                @endif
                @if($item->kategori == 'info penting')
                <h1 class="text-gray-900 dark:text-white text-center">Tidak Bisa Diubah</h1>
                @endif
            </div>
        @endforeach
    </div>

</div>
@endsection


@foreach ($data as $delete)
<dialog id="delete_{{ $delete->id }}" class="modal modal-bottom sm:modal-middle ">
    <form action="/admin/kategori-berita/hapus/{{ $delete->id }}" method="POST" class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
      @csrf
      <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
      <div class="modal-action">
          <label for="closeDelete{{ $delete->id }}" class="btn bg-red-600 hover:bg-red-700 border-none">Tidak</label>
          <button class="btn bg-lime-600 hover:bg-lime-700 border-none">Hapus</button>
      </div>
  </form>
    <form method="dialog" class="modal-box bg-white dark:bg-gray-700 text-gray-900 dark:text-white hidden">
      <p class="py-4">Apakah kamu yakin mau menghapus data ini ?</p>
      <div class="modal-action">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn" id="closeDelete{{ $delete->id }}">Close</button>
      </div>
    </form>
  </dialog>
@endforeach