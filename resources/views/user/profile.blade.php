<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('user.Template.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('user.Template.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ubah Data</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Ubah Data</a></li>
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
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('user.change')}}" method="post">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama:</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Saat Ini -->
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini:</label>
                        <input type="password" class="form-control" name="current_password" required>
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Baru -->
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="new_password" id="new_password">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">Lihat</button>
                            </div>
                        </div>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password Baru -->
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru:</label>
                        <input type="password" class="form-control" name="new_password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        @include('user.Template.footer')
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('user.Template.script')
</body>
</html>
