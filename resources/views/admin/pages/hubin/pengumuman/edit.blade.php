@extends('admin/v_admin')
@section('judulhalaman', 'Edit Pengumuman')
@section('title', 'Edit Pengumuman')

@section('konten')
<form action="{{ route('pengumuman.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input type="text" name="judul_pengumuman" class="form-control" value="{{ old('judul_pengumuman', $announcement->judul_pengumuman) }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $announcement->kategori) }}" required>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                @if($announcement->gambar)
                    <p><img src="{{ asset('storage/' . $announcement->gambar) }}" alt="" width="100"></p>
                @endif
                <div class="custom-file">
                    <input type="file" name="gambar" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih file baru jika ingin mengganti</label>
                </div>
            </div>
            <div class="form-group">
                <label>Lampiran</label>
                @if($announcement->lampiran)
                    <p><a href="{{ asset('storage/' . $announcement->lampiran) }}" target="_blank">Lihat Lampiran</a></p>
                @endif
                <input type="file" name="lampiran" class="form-control">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Pengumuman</label>
                <input type="date" name="tanggal_pengumuman" class="form-control" value="{{ old('tanggal_pengumuman', $announcement->tanggal_pengumuman) }}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" class="form-control" value="{{ old('tanggal_berakhir', $announcement->tanggal_berakhir) }}">
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $announcement->lokasi) }}">
            </div>
            <div class="form-group">
                <label>Kontak Email</label>
                <input type="email" name="kontak_email" class="form-control" value="{{ old('kontak_email', $announcement->kontak_email) }}">
            </div>
            <div class="form-group">
                <label>Kontak Telepon</label>
                <input type="text" name="kontak_telepon" class="form-control" value="{{ old('kontak_telepon', $announcement->kontak_telepon) }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Berkas Dibutuhkan</label>
                <input type="text" name="berkas_dibutuhkan" class="form-control tagify"
                value="{{ old('berkas_dibutuhkan', is_array($announcement->berkas_dibutuhkan) ? implode(',', $announcement->berkas_dibutuhkan) : $announcement->berkas_dibutuhkan) }}">
            </div>
            <div class="form-group">
                <label>Persyaratan</label>
                <input type="text" name="persyaratan" class="form-control tagify" value="{{ old('persyaratan', is_array($announcement->persyaratan) ? implode(',', $announcement->persyaratan) : $announcement->persyaratan) }}">
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <input type="text" name="posisi" class="form-control tagify"
                value="{{ old('posisi', is_array($announcement->posisi) ? implode(',', $announcement->posisi) : $announcement->posisi) }}">

            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <label>Isi Pengumuman</label>
        <textarea name="isi_pengumuman" id="isi_pengumuman" rows="10">{{ old('isi_pengumuman', $announcement->isi_pengumuman) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
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
    new Tagify(document.querySelector('input[name=posisi]'));
    new Tagify(document.querySelector('input[name=berkas_dibutuhkan]'));
    new Tagify(document.querySelector('input[name=persyaratan]'));

</script>
@endsection
