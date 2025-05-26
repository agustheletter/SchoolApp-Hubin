@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Pengumuman')
@section('title', 'Pengumuman')

@section('konten')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Pengumuman
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover mb-0">
        <thead class="thead-light">
            <tr>
                <th style="width: 50px;">No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Tanggal Berakhir</th>
                <th style="width: 130px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->judul_pengumuman }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengumuman)->format('d M Y') }}</td>
                    <td>{{ $item->tanggal_berakhir ? \Carbon\Carbon::parse($item->tanggal_berakhir)->format('d M Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('pengumuman.show', $item->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada pengumuman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
