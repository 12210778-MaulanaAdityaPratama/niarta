@extends('user.Template.utama')

@section('konten')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Folder</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Folder</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <h2>Daftar Folder - {{ $perizinan->nama_perusahaan }}</h2>
              
              <!-- Tampilkan daftar folder -->
             <!-- Tampilkan daftar folder -->
             @if ($perizinan->folders && count($perizinan->folders) > 0)
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Nama Folder</th>
                         <th>Ukuran</th>
                         <th>Tanggal Upload</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($perizinan->folders as $folder)
                         <tr>
                             <td class="fas fa-folder"> <a href="{{ route('user.file.index', ['folder_id' => $folder->id]) }}">{{ $folder->nama_folder }}</a></td> 
                             <td>{{ $folder->getTotalUkuranFile() }}</td>
                             <td>{{ $folder->created_at }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         @else
             <p>Tidak ada folder untuk perizinan ini.</p>
         @endif


              <!-- Tombol untuk kembali ke daftar perizinan -->
              <a href="{{ route('user.perizinan')}}" class="btn btn-primary">Kembali</a>
          </div>
      </div>
  </div>
</section>





@endsection
