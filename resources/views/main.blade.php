<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Lato", sans-serif;
  margin: 0;
  padding: 0;
}

.sidenav {
  height: 100%;
  width: 190px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #bc1e2d;
  opacity: .9;
  overflow-x: hidden;
  padding-top: 20px;
  padding: 1rem;
}

.sidenav h4 {
    color: #fff;
    font-weight: 700;
    margin-top: 3rem;
    margin-bottom: 1rem;
}
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: .8rem;
  color: #fff;
  display: block;
}

.sidenav > .sidenav_logo > img {
    width: 100%;
    display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 190px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 1rem 1rem;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="sidenav">
  <div class="sidenav_logo">
    <img src="{{ asset('assets/img/logo2.png') }}" />
  </div>
  <h4>Menu</h4>
  <a href="#/dashboard">Dashboard</a>
  <a href="#/data-master">Data Master</a>
  <a href="#/data-mahasiswa">Data Mahasiswa</a>
  <a href="#/jadwal-pengisian">Data Jadwal Pengisian</a>
  <a href="#/laporan">Laporan</a>
</div>

<div class="main"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('src/app-controller.js') }}"></script>

<script>
  $(function() {
      MainController.init()
  })
</script>
</body>
</html> 