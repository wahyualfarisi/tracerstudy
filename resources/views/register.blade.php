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
        <a href="/" >
            <i class="fa fa-arrow-left fa-2x"></i>
            <span>Kembali ke menu utama</span>
        </a>
    </div>
   
    <div class="welcome_main">
        <img src="{{ asset('assets/img/logo.png') }}" /> 
        <h1 class="welcome_heading">Tracer Study</h1>
        <h3 class="welcome_subheading">Registrasi</h3>

        <form class="form_login" id="form_registrasi" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nim">Nim</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nim" 
                    aria-describedby="nim" 
                    placeholder="Masukan nim"
                    name="nim"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <select name="kode_prodi" id="prodi" class="form-control" required>
                    <option value=""></option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="SK">Sistem Komputer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nama_lengkap" 
                    name="nama_lengkap"
                    aria-describedby="nama_lengkap" 
                    placeholder="Masukan nama lengkap"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="exampleInputEmail1" 
                    name="email"
                    aria-describedby="emailHelp" 
                    placeholder="Masukan Email"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="alamat" 
                    name="alamat"
                    aria-describedby="emailHelp" 
                    placeholder="Masukan Alamat"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="no_telepon" 
                    name="no_telepon"
                    aria-describedby="emailHelp" 
                    placeholder="Masukan No Telepon"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode pos</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="kode_pos" 
                    name="kode_pos"
                    aria-describedby="emailHelp" 
                    placeholder="Masukan Kode Pos"
                    required
                >
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>

            <div class="form-group">
                <label for="judul_skripsi">Judul Skripsi</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="judul_skripsi" 
                    name="judul_skripsi"
                    placeholder="Judul Skripsi"
                    required
                >
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="dospem_1">Dosen Pembimbing 1</label>
                    <select name="dospem_1" id="prodi" class="form-control" required>
                        <option value="">Pilih dosen pembimbing 1</option>
                        <option value="B. Gunawan S, ST., M.Kom ">B. Gunawan S, ST., M.Kom </option>
                        <option value="Fauziah S.Kom., MMSI">Fauziah S.Kom., MMSI</option>
                        <option value="Alex S.T M.Kom">Alex S.T M.Kom</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="dospem_2">Dosen Pembimbing 2</label>
                    <select name="dospem_2" id="prodi" class="form-control" required>
                        <option value="">Pilih dosen pembimbing 2</option>
                        <option value="B. Gunawan S, ST., M.Kom ">B. Gunawan S, ST., M.Kom </option>
                        <option value="Fauziah S.Kom., MMSI">Fauziah S.Kom., MMSI</option>
                        <option value="Alex S.T M.Kom">Alex S.T M.Kom</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="tahun_lulus" 
                    name="tahun_lulus"
                    placeholder="Tahun Lulus"
                    required
                >
            </div>

            <div class="form-group">
                <label for="photo">Foto Mahasiswa</label>
                <input 
                    type="file" 
                    class="form-control" 
                    id="photo"
                    name="photo"
                >
            </div>
            <div class="form-group">
                <img src="" width="200px;" class="preview_image img-responsive" >
            </div>
            <button type="submit" class="btn btn-primary">Registrasi</button>
        </form>

    </div>
    <div class="welcome_footer">
        
    </div>


    <script src="{{asset('assets/js/jquery.min.js')}}" ></script>
    <script src="{{asset('assets/js/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/block-ui/jquery.blockUI.js')}}"></script>
    <script src="{{asset('assets/js/JIC.min.js')}}"></script>
    <script src="{{asset('src/app-library.js')}}"></script>
    <script src="{{asset('src/app-controller.js')}}"></script>
    <script>
        $(function() {
            MahasiswaController.registrasi();
        })
    </script>
</body>
</html>