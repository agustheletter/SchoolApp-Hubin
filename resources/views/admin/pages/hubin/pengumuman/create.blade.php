@extends('admin/v_admin')
@section('judulhalaman', 'Tambah Pengumuman')
@section('title', 'Tambah Pengumuman')

@section('konten')
<form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input type="text" name="judul_pengumuman" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required placeholder="Contoh: Lowongan Kerja, Informasi Umum">
            </div>

            <div class="form-group">
                <label>Gambar Pengumuman</label>
                <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input" id="gambar" onchange="previewImage(event)">
                    <label class="custom-file-label" for="gambar" id="gambar-label">Choose file</label>

                </div>
                <img id="preview" src="{{ isset($pengumuman) && $pengumuman->gambar ? asset($pengumuman->gambar) : '#' }}"
                alt="Preview Gambar"
                style="max-width: 200px; margin-top: 10px; display: {{ isset($pengumuman) && $pengumuman->gambar ? 'block' : 'none' }}">
            </div>
            <div class="form-group">
                <label>Lampiran</label>

                <div class="custom-file">
                    <input type="file" name="lampiran" class="form-control" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Pengumuman</label>
                <input type="date" name="tanggal_pengumuman" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control">
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control">
            </div>
            <div class="form-group">
                <label>Kontak Email</label>
                <input type="email" name="kontak_email" class="form-control">
            </div>
            <div class="form-group">
                <label>Kontak Telepon</label>
                <input type="text" name="kontak_telepon" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Berkas Dibutuhkan</label>
                <input type="text" name="berkas_dibutuhkan" class="form-control tagify" placeholder='Contoh: KTP, CV'>
            </div>
            <div class="form-group">
                <label>Persyaratan</label>
                <input type="text" name="persyaratan" class="form-control" placeholder='Contoh: WNI, Usia 18-35'>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <input type="text" name="posisi" class="form-control tagify" placeholder='Contoh: Admin, HR'>
            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <label>Isi Pengumuman</label>
        <textarea name="isi_pengumuman" id="isi_pengumuman" rows="10">{{ old('isi_pengumuman') }}</textarea>

    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>

<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#isi_pengumuman'), {
            height: '300px', 
        })
        .then(editor => {
            editor.ui.view.editable.element.style.height = '300px';
        })
        .catch(error => {
            console.error(error);
        });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
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
<script>
    const posisiInput = document.querySelector('input[name=posisi]');
    new Tagify(posisiInput);
    const persyaratanInput = document.querySelector('input[name=persyaratan]');
    new Tagify(persyaratanInput);
    const berkasInput = document.querySelector('input[name=berkas_dibutuhkan]');
    new Tagify(berkasInput);
</script>
@endsection
