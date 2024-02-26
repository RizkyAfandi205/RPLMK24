<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <style>
      * {
        font-family: "Poppins", sans-serif;
      }
      /* nav {
        background-color: #7f27ff;
      } */
      .navbar-brand {
        font-weight: 600;
      }
      a {
        text-decoration: none;
      }
      .box{
      overflow: hidden;
      position: relative;
      }
      .box img{
          width: 100%;
          height: auto;
      }
      .box .box-content{
          width: 100%;
          height: 100%;
          position: absolute;
          top: 0;
          left: 0;
          transition: all 0.3s ease 0.5s;
      }
      .box:before,
      .box:after,
      .box .box-content:before,
      .box .box-content:after,
      .box .box-overlay{
          content: "";
          width: 20%;
          height: 100%;
          background: rgba(0,0,0,0.6);
          position: absolute;
          top: 0;
          left: 0;
          opacity: 0;
          transform: scale(1.2);
          transition: all 0.3s ease 0.1s;
      }
      .box:after{
          left: 20%;
          transition-delay: 0.2s;
      }
      .box .box-content:before{
          left: 40%;
          transition-delay: 0.3s;
      }
      .box .box-content:after{
          left: 60%;
          transition-delay: 0.4s;
      }
      .box .box-overlay{
          left: 80%;
          transition-delay: 0.5s;
      }
      .box:hover:before,
      .box:hover:after,
      .box:hover .box-content:before,
      .box:hover .box-content:after,
      .box:hover .box-overlay{
          opacity: 1;
          transform: scale(1);
      }
      .box .inner-content{
          width: 100%;
          color: #fff;
          text-align: center;
          position: absolute;
          top: 50%;
          left: 50%;
          opacity: 0;
          z-index: 1;
          transform: translate(-50%, -50%) scale(1.5);
          transition: all 0.3s ease 0.5s;
      }
      .box:hover .inner-content{
          opacity: 1;
          transform: translate(-50%, -50%) scale(1);
      }
      .box .title{
          font-size: 25px;
          font-weight: 600;
          text-transform: uppercase;
          margin: 0;
      }
      .box .post{
          display: inline-block;
          font-size: 16px;
          font-style: italic;
          letter-spacing: 1px;
          text-transform: capitalize;
          margin: 5px 0 20px 0;
      }
      .modal-body .col-lg-7 img {
            width: 600px;
      }
      @media only screen and (max-width:990px){
          .box{ margin-bottom: 30px; }
          .modal-body .col-lg-7 img {
            width: 450px;
          }
      }
      @media screen and (max-width: 600px) {
        .modal-body .col-lg-7 img {
          width: 300px;
        }
      }
      @media screen and (max-width: 280px) {
        .modal-body .col-lg-7 img {
          width: 200px;
        }
      }
      
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-body-secondary">
      <div class="container">
        <a class="navbar-brand text-dark" href="/">Gallery Photo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item me-3">
              <a class="nav-link active text-dark" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item me-3">
              <a class="nav-link active text-dark" aria-current="page" href="/my_posts">My Post</a>
            </li>
            <li class="nav-item dropdown me-5">
              <a class="nav-link dropdown text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Category <i class="fas fa-angle-down"></i> </a>
              <ul class="dropdown-menu overflow-auto">
                <li>
                  <a class="dropdown-item" href="/kategori/art"><i class="fas fa-paint-brush me-2"></i>Art</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/kategori/sport"><i class="fas fa-volleyball-ball me-2"></i>Sport</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/kategori/pet"><i class="fas fa-cat me-2"></i>Pet</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/kategori/view"><i class="fas fa-mountain me-2"></i>View</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/kategori/food"><i class="fas fa-hamburger me-2"></i>Food</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/kategori/quote"><i class="fas fa-quote-right me-2"></i>Quote</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                <a class="dropdown-item nav-link active text-dark" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    @yield('content')


    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/8f81cad53a.js" crossorigin="anonymous"></script>
</body>
</html>
