@extends('Template.utama')

@section('konten')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">>Tambah Data</a></li>
            <li class="breadcrumb-item"><a href="#">Form Folder</a></li>
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
           <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">FORM FOLDER</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('folder.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="perizinan_id" value="{{ $perizinan->id }}">
                        <div class="mb-3">
                            <label for="nama_folder" class="form-label">NAMA FOLDER</label>
                            <input type="text" class="form-control" id="nama_folder" name="nama_folder">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
           </div>
        </div>
      </div>
  </section>

@endsection
