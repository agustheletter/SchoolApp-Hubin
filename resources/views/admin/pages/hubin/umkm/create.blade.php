@extends('admin/v_admin')
@section('judulhalaman', 'Tambah UMKM')
@section('title', 'Tambah UMKM')

@section('konten')
<form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" name="nama_pemilik" class="form-control" required placeholder="Nama lengkap pemilik usaha">
            </div>

            <div class="form-group">
                <label>Kontak Usaha</label>
                <input type="text" name="kontak_usaha" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Alamat Usaha</label>
                <input type="text" name="alamat_usaha" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori Usaha</label>
                <input type="text" name="kategori_usaha" class="form-control" required placeholder="Contoh: Kuliner, Fashion">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Sosial Media</label>
                <input type="text" name="sosmed_usaha" class="form-control" placeholder="Contoh: @namasocmed atau link IG">
            </div>

            <div class="form-group">
                <label>Gambar Usaha</label>
                <div class="custom-file">
                    <input type="file" name="gambar_usaha" class="custom-file-input" id="gambar" onchange="previewImage(event)">
                    <label class="custom-file-label" for="gambar" id="gambar-label">Choose file</label>
                </div>
                <img id="preview" src="#" alt="Preview Gambar" style="max-width: 200px; margin-top: 10px; display: none;">
            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <label>Deskripsi Usaha</label>
        <textarea name="deskripsi_usaha" id="deskripsi_usaha" rows="5" class="form-control">{{ old('deskripsi_usaha') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const label = document.getElementById('gambar-label');

    if (input.files && input.files[0]) {
        const file = input.files[0];
        label.textContent = file.name;
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        label.textContent = 'Choose file';
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_usaha'), {
            height: '300px', 
        })
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
