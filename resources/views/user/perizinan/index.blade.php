@extends('user.Template.utama')

@section('konten')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Perizinan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Perizinan</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <table class="table table-border table-hover">
                <thead>
                    <tr>
                        <th>JENIS USAHA</th>
                        <th>NAMA PERUSAHAAN</th>
                        <th>LOKASI</th>
                        <th>EMAIL</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perizinan as $p)                 
            <tr>
                <td>{{$p->jenis_usaha}}</td>
                <td class="fas fa-folder"> <a href="{{ route('user.perizinan.view', $p->id) }}">{{$p->nama_perusahaan}}</td>
                <td>{{$p->lokasi}}</td>
                <td>{{$p->email}}</td>
            </tr>
            @endforeach
                  
                </tbody>
            </table>
        </div>
      </div>
  </section>

@endsection
