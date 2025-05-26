<!--awal konten dinamis-->
@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Ruangan')
@section('title', 'Ruangan')

<!--awal isi konten dinamis-->
@section('konten')

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPerusahaan">
        Tambah Data Perusahaan
    </button>

    <p>

    <!-- Awal membuat table-->
    <table id="table-perusahaan" class="table table-bordered table-striped table-hover table-sm">
        <!-- Awal header table-->
        <thead>
            <tr>
                <th width="5%"><center>No</center></th>
                <th><center>Logo</center></th>
                <th><center>Nama</center></th>
                <th><center>Alamat</center></th>
                <th><center>Kontak</center></th>
                <th><center>Email</center></th>
                <th><center>Bidang Kerja</center></th>
                <th><center>Status</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <!-- Akhir header table-->

        <!-- Awal menampilkan data dalam table-->
        
        <tbody>
            @foreach ($perusahaan as $index => $d)
                <tr>
                    <td align="center">{{ $d->id }}</td>
                    <td align="center">
                        @if ($d->logo)
                            <img src="{{ asset($d->logo) }}" width="50" height="50" alt="Logo">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->alamat }}</td>
                    <td>{{ $d->kontak }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->bidang_kerja }}</td>
                    <td>
                        <span class="badge badge-{{ $d->status == 'aktif' ? 'success' : 'danger' }}">
                            {{ ucfirst($d->status) }}
                        </span>
                    </td>
                    <td align="center">
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modalEditPerusahaan{{ $d->id }}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <div class="modal fade" id="modalEditPerusahaan{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditPerusahaanLabel{{ $d->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('perusahaan.update', $d->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditPerusahaanLabel{{ $d->id }}">Form Edit Data Perusahaan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label for="nama{{ $d->id }}" class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" id="nama{{ $d->id }}" class="form-control" value="{{ $d->nama }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="alamat{{ $d->id }}" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat" id="alamat{{ $d->id }}" class="form-control" value="{{ $d->alamat }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="kontak{{ $d->id }}" class="col-sm-3 col-form-label">Kontak</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kontak" id="kontak{{ $d->id }}" class="form-control" value="{{ $d->kontak }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email{{ $d->id }}" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" id="email{{ $d->id }}" class="form-control" value="{{ $d->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="website{{ $d->id }}" class="col-sm-3 col-form-label">Website</label>
                                                <div class="col-sm-9">
                                                    <input type="url" name="website" id="website{{ $d->id }}" class="form-control" value="{{ $d->website }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="deskripsi{{ $d->id }}" class="col-sm-3 col-form-label">Deskripsi</label>
                                                <div class="col-sm-9">
                                                    <textarea name="deskripsi" id="deskripsi{{ $d->id }}" class="form-control">{{ $d->deskripsi }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="bidang_kerja{{ $d->id }}" class="col-sm-3 col-form-label">Bidang Kerja</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="bidang_kerja" id="bidang_kerja{{ $d->id }}" class="form-control" value="{{ $d->bidang_kerja }}">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="logo{{ $d->id }}" class="col-sm-3 col-form-label">Logo</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="logo" id="logo{{ $d->id }}" class="form-control-file" accept="image/*">
                                                    @if ($d->logo)
                                                        <img id="previewLogo{{ $d->id }}" src="{{ asset($d->logo) }}" style="display: block; max-height: 100px; margin-top: 10px;" alt="Logo">
                                                    @else
                                                        <img id="previewLogo{{ $d->id }}" style="display: none; max-height: 100px; margin-top: 10px;" alt="Logo">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="status{{ $d->id }}" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="status" id="status{{ $d->id }}" class="form-control">
                                                        <option value="aktif" {{ $d->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="nonaktif" {{ $d->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapusPerusahaan{{ $d->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <!-- Modal Hapus Perusahaan -->
                        <div class="modal fade" id="modalHapusPerusahaan{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusPerusahaanLabel{{ $d->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ url('/admin/perusahaan/hapus/' . $d->id) }}" method="POST" class="modal-content">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalHapusPerusahaanLabel{{ $d->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <p>Yakin ingin menghapus data perusahaan berikut?</p>
                                        <h5 class="text-danger">{{ $d->nama }}</h5>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Akhir Modal hapus data ruangan -->
                    </td>
                </tr>
                @endforeach
        </tbody>
        
        <!-- Akhir menampilkan data dalam table-->

    </table>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-perusahaan').DataTable();
        });
    </script>
    <!-- Akhir membuat table-->


    <!-- Awal Modal tambah data ruangan -->
    <div class="modal fade" id="modalTambahPerusahaan" tabindex="-1" role="dialog" aria-labelledby="modalTambahPerusahaanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahPerusahaanLabel">Form Input Data Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="formperusahaantambah" id="formperusahaantambah" action="{{ route('perusahaan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Perusahaan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kontak" class="col-sm-3 col-form-label">Kontak</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukkan Nomor Kontak">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="website" name="website" placeholder="Masukkan Website (opsional)">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bidang_kerja" class="col-sm-3 col-form-label">Bidang Kerja</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bidang_kerja" name="bidang_kerja" placeholder="Masukkan Bidang Kerja">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="logoTambah" name="logo" accept="image/*">
                                <img id="previewLogoTambah" style="display: none; max-height: 100px; margin-top: 10px;" alt="Preview Logo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="status" name="status">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data ruangan -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @foreach ($perusahaan as $d)
                document.getElementById('logo{{ $d->id }}').addEventListener('change', function(event) {
                    const [file] = event.target.files;
                    const preview = document.getElementById('previewLogo{{ $d->id }}');
                    if (file) {
                        preview.src = URL.createObjectURL(file);
                        preview.style.display = 'block';
                    } else {
                        preview.style.display = 'none';
                    }
                });
            @endforeach
        });
        document.getElementById('logoTambah').addEventListener('change', function(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('previewLogoTambah');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });
    </script>


@endsection
<!--akhir isi konten dinamis-->



<!--akhir konten dinamis-->
