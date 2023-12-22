@extends('user.Template.utama')

@section('konten')
    <!-- Tampilkan informasi folder -->
    <h2>Daftar File - {{ $folder->nama_folder }}</h2>

    <!-- Tambahkan tautan untuk menambah file -->
    <div class="mb-3">
    </div>
    <form action="{{ route('user.file.index', ['folder_id' => $folder->id]) }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari file..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            <!-- Tambahkan tombol "Clear" -->
            <a href="{{ route('user.file.index', ['folder_id' => $folder->id]) }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </form>

    <!-- Tampilkan daftar file -->
    @if ($files && count($files) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama File</th>
                    <th>Ukuran</th>
                    <th>Aksi</th>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->nama_file }}</td>
                        <td>{{ $file->ukuran }} KB</td>
                        <td>
                            <a href="{{ route('user.file.download', ['file_id' => $file->id]) }}" class="btn btn-primary">Unduh</a>
                            <!-- Tambahkan tombol atau tautan lainnya sesuai kebutuhan -->
                           <!-- Tambahkan tombol hapus -->
                        </td>
                       
                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada file untuk folder ini.</p>
    @endif

    <!-- Tambahkan tombol atau tautan kembali ke daftar folder -->
    <a href="{{ route('user.perizinan.view', ['id' => $folder->perizinan->id]) }}" class="btn btn-primary">Kembali</a>
@endsection
