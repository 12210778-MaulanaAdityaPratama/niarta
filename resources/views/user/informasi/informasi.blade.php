@extends('user.Template.utama')

@section('konten')

 <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
                color: #333;
            }



            .logo {
                max-width: 30%;
                margin-bottom: 30px;
                margin-top: 0px;
                margin-right: auto;
                margin-left: auto;
                display: block;
            }

            .header{
                display: flex;
                flex-wrap: wrap;
                align-items:center;
                text-align: center;
            }

            .header {
                flex: 1;
            }

            .contact {
                margin-top: 100px;
                text-align: center;
            }


            .contact .info {
            text-align: right;
            font-family: 'Times New Roman', Times, serif; /* Menggunakan Times New Roman */
            flex-direction: column;
            color: #777;
            display: flex;
            }

            p {
                margin-bottom: 25px;
                font-family: 'Times New Roman', Times, serif;
            }


            @media (max-width: 600px){
                .header div{
                display: flex;
                flex-wrap: wrap;
                align-items:center;
                text-align: center;
                }
                .logo{
                    max-width: 60%;
                    margin-bottom: 5%;
                    margin-top: 0%;
                }

                .contact {
                flex-direction: column;
                }
                .contact .info {
                margin-top: 10px; /* Memberikan jarak di atas elemen info saat layar lebih kecil */
            }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img class="logo" src="{{asset('Gambar/logo.png')}}">
                <div>
                    <p>PT Niarta Ridho Utama (NARU) adalah perusahaan dibidang jasa konsultan Eksplorasi Geologi, Pertambangan dan Lingkungan yang didirikan berdasarkan Akta Notaris pada tanggal 21 Mei 2022 dan disahkan berdasarkan Keputusan Menteri Kehakiman dan Hak Asasi Manusia Nomor AHU-0034280.AH.01.01 Tahun 2022.</p>

                    <p>PT Niarta Ridho Utama (NARU) sendiri dibentuk dari perkumpulan tim dan individu yang profesional, memiliki latar belakang yang kuat dalam ilmu teknik serta didukung oleh tenaga ahli yang berpengalaman dan telah diakui kompetensinya.</p>

                    <p>PT Niarta Ridho Utama (NARU) berkomitmen dalam menjalankan jasa konsultan pertambangan yang profesional serta mengedepankan teknologi sesuai dengan Kaidah Teknik Pertambangan Yang Baik (Good Mining Practice) yang berwawasan K3 dan Lingkungan.</p>
                </div>
            </div>
            </div>

            <div class="contact">
                <div class="info">
                    <p><i class="fa fa-envelope" style="margin-right: 3px;"></i>naru@niartaasiagroup.com</p>
                </div>
                <div class="info">
                    <p><i class="fa fa-phone" style="margin-right: 3px;"></i>(0561) 67-333-53</p>
                </div>
                <div class="info">
                    <p><i class="fa fa-map-marker" style="margin-right: 3px;"></i>Pontianak, ID</p>
                </div>
            </div>
        </body>
        </html>
            </div>
        </div>
    </body>
</section>
@endsection