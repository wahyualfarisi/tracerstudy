<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Mahasiswa - Universitas Bung Karno</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} " >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="welcome"></header>
    <div class="welcome_navigation">
        <a href="/app/#/laporan" >
            <i class="fa fa-arrow-left fa-2x"></i>
            <span>Kembali ke dashboard</span>
        </a>
    </div>
   
    <div class="laporan_container">
        <div class="laporan_header">
            <img src="{{ asset('assets/img/logo.png') }}" width="230px" /> 
            <h4 class="welcome_heading">Laporan Tracer Study</h4>
            <h6>Fakultas Ilmu Komputer</h6>
            <h6>Tahun Kelulusan {{ $year }}</h6>
        </div>
        {{-- <h6>Mahasiswa yang sudah menjawab : <span id="yang_sudah_menjawab"></span> / <span></span> </h6> --}}
        <div class="laporan_data">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Jawaban Keseluruhan Peserta</th>
                    </tr>
                </thead>
                <tbody id="laporan_body">
                    
                </tbody>
            </table>
        </div>
        
    </div>
   
    <script src="{{asset('assets/js/jquery.min.js')}}" ></script>
    <script src="{{asset('assets/js/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/block-ui/jquery.blockUI.js')}}"></script>
    <script src="{{asset('assets/js/JIC.min.js')}}"></script>
    <script src="{{asset('src/app-library.js')}}"></script>
    <script src="{{asset('src/app-controller.js')}}"></script>
    <script>
        $(function() {
            var YEAR = "{{ $year }}"
            LaporanControllor.data(YEAR);
        })
    </script>
</body>
</html>