
var editor = new FroalaEditor('#isiBerita', {
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