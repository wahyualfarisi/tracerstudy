<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tracer study</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} " >
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

  * {
    font-family: "Lato", sans-serif;
    margin: 0;
    padding: 0;
    /* font-size: 62.5%; */
  }
  body {
   
  }

  ul {
    margin: 0;
    padding: 0;
  }

  .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: var(--color-primary);
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
    margin-left: 250px; /* Same as the width of the sidenav */
    font-size: 1rem; /* Increased text to enable scrolling */
    padding: 4rem 2rem;

  }

  .button-signout {
    position: absolute;
    bottom: 10px;
    right: 10px;
  }

  .button-signout button {
    border: none;
    outline: none;
    padding: .4rem 1rem;
    border-radius: 1rem;
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

  <div class="menus">
    
  </div>
  
  <div class="button-signout">
    <button class="btn_logout">Logout</button>
  </div>
</div>

<div class="main"></div>

<script src="{{asset('assets/js/jquery.min.js')}}" ></script>
<script src="{{ asset('assets/vendors/datatable/datatables.min.js') }} " type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/block-ui/jquery.blockUI.js')}}"></script>
<script src="{{asset('assets/js/notify.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('assets/js/JIC.min.js')}}"></script>
<script src="{{asset('src/app-library.js')}}"></script>
<script src="{{asset('src/app-controller.js')}}"></script>

<script>
  $(function() {
      MainController.init()
  })
</script>
</body>
</html> 
