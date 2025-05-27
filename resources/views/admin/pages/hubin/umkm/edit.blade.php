@extends('admin/v_admin')
@section('judulhalaman', 'Edit UMKM')
@section('title', 'Edit UMKM')

@section('konten')
<form action="{{ route('umkm.update', $usaha->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Usaha</label>
                <input type="text" name="nama_usaha" class="form-control" value="{{ $usaha->nama_usaha }}" required>
            </div>

            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" name="nama_pemilik" class="form-control" required placeholder="Nama lengkap pemilik usaha" value="{{ $usaha->pemilik_usaha }}">
            </div>

            <div class="form-group">
                <label>Kontak Usaha</label>
                <input type="text" name="kontak_usaha" class="form-control" value="{{ $usaha->kontak_usaha }}" required>
            </div>

            <div class="form-group">
                <label>Alamat Usaha</label>
                <input type="text" name="alamat_usaha" class="form-control" value="{{ $usaha->alamat_usaha }}" required>
            </div>

            <div class="form-group">
                <label>Kategori Usaha</label>
                <input type="text" name="kategori_usaha" class="form-control" value="{{ $usaha->kategori_usaha }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Sosial Media</label>
                <input type="text" name="sosmed_usaha" class="form-control" value="{{ $usaha->sosmed_usaha }}">
            </div>

            <div class="form-group">
                <label>Gambar Usaha</label>
                <div class="custom-file">
                    <input type="file" name="gambar_usaha" class="custom-file-input" id="gambar" onchange="previewImage(event)">
                    <label class="custom-file-label" for="gambar" id="gambar-label">Choose file</label>
                </div>
                <img id="preview" src="{{ asset($usaha->gambar_usaha) }}" alt="Preview Gambar"
                style="max-width: 200px; margin-top: 10px; {{ $usaha->gambar_usaha ? 'display:block;' : 'display:none;' }}">
            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <label>Deskripsi Usaha</label>
        <textarea name="deskripsi_usaha" id="deskripsi_usaha" rows="5" class="form-control">{{ $usaha->deskripsi_usaha }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
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
