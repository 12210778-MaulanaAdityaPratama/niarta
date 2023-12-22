@extends('Template.utama')

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
            <li class="breadcrumb-item">>Perizinan</a></li>
            <li class="breadcrumb-item"><a href="#">Form Perizinan</a></li>
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
                    <span class="card-title">FORM PERIZINAN</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('perizinan.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_usaha" class="form-label">JENIS USAHA</label>
                            <select class="form-select" style="width:100%" name='jenis_usaha'>
                                <option value="PN_IUP" {{($perizinan->jenis_usaha ?? '') == 'PN_IUP' ? 'selected' : ''}} >Peningkatan IUP</option>
                                <option value="PL_RUTIN" {{ ($perizinan->jenis_usaha ?? '') == 'PL_RUTIN' ? 'selected' : ''}}>Pelaporan Rutin</option>
                                <option value="PJ_IUP" {{ ($perizinan->jenis_usaha ?? '') == 'PJ_IUP' ? 'selected' : ''}}>Perpanjangan IUP</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">NAMA PERUSAHAAN</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label">ALAMAT PERUSAHAAN</label>
                            <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">LOKASI</label>
                            <input type="text"  class="form-control" id="lokasi" name="lokasi">
                        </div>
                        <div class="mb-3">
                            <label for="golongan" class="form-label">GOLONGAN</label>
                            <input type="text" class="form-control" id="golongan" name="golongan">
                        </div>
                        <div class="mb-3">
                            <label for="komoditas" class="form-label">KOMODITAS</label>
                            <input type="text" class="form-control" id="komoditas" name="komoditas">
                        </div>
                        <div class="mb-3">
                            <label for="luas" class="form-label">LUAS</label>
                            <input type="number" class="form-control" id="luas" name="luas">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email">
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
