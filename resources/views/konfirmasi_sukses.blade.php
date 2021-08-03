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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="welcome"></header>
    <div class="welcome_navigation">
        <a href="/" >
            <i class="fa fa-arrow-left fa-2x"></i>
            <span>Kembali ke menu utama</span>
        </a>
    </div>
   
    <div class="welcome_main">
        <img src="{{ asset('assets/img/logo.png') }}" /> 
        <h1 class="welcome_heading">Tracer Study</h1>
        <h3 class="welcome_subheading">Registrasi Berhasil</h3>

        <div style="width: 40%;">
            <p>
                Silahkan menunggu, data anda akan di konfirmasi oleh TU untuk di validasi . setelah berhasil di validasi anda dapat login menggunakan email yang sudah di daftarkan pada formulir
            </p>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/block-ui/jquery.blockUI.js')}}"></script>
    <script src="{{asset('assets/js/JIC.min.js')}}"></script>
    <script src="{{asset('src/app-library.js')}}"></script>
    <script src="{{asset('src/app-controller.js')}}"></script>
</body>
</html>