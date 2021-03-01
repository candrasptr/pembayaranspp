<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SPP | SMKN 1 PDH</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="icon" href="{{ asset('assets/img/logosmk.png') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style2.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/font.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>


<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm fixed-top mb-3">
        <img src="{{asset('assets/img/smk.png')}}" style="width: 100px;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-3">
              <li class="nav-item text-right" >
                <a class="nav-link hejo" href="/home" id="bo">Hi, {{ Auth::guard('siswa')->user()->nama}}</span></a>
              </li>
              <li class="navbar-nav text-right">
                  <a href="/logoutsiswa" class="hejo"><i class="fas fa-sign-out-alt mt-2" style="font-size: 22px;"></i></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
</div>
<br><br><br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            @php
                $nisn = Auth::guard('siswa')->user()->nisn
            @endphp
            <a href="{{ route('siswa.his',$nisn) }}">
                <div class="card" id="card-cart" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card-body row">
                        <div class="col-md-4">
                            <img src="{{asset('assets/img/invoice.png')}}" style="width: 120px;">
                        </div>
                        <div class="col-md-8 mt-3" id="text-hejo"><br><h5 id="bo">HISTORY PEMBAYARAN</h5></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
    


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
