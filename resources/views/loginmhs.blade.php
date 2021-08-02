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
        <h3 class="welcome_subheading">Login Mahasiswa</h3>

        <form class="form_login">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password">
            </div>
            <button type="submit" class="btn btn-danger">Masuk</button>
        </form>

    </div>
    <div class="welcome_footer">
        <p class="welcome_textlink">Jika anda belum mempunyai akun, silahkan register <a href="#">Disini</a> </p>
    </div>
</body>
</html>