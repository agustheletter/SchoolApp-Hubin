@extends('admin/v_admin')
@section('judulhalaman', 'Daftar UMKM')
@section('title', 'UMKM')

@section('konten')
<a href="{{ route('umkm.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah UMKM
</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Usaha</th>
                <th>Kategori</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_usaha }}</td>
                    <td>{{ $item->kategori_usaha }}</td>
                    <td>{{ $item->kontak_usaha }}</td>
                    <td>
                        <a href="{{ route('umkm.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('umkm.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
