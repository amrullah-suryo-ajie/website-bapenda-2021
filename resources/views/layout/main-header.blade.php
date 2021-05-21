<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-danger navbar-dark">
<div class="container">
      <a href="{{ url('/home') }}" class="navbar-brand">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text font-weight-light">SIMPADA 1.0</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
<!-- Left navbar links -->
<ul class="navbar-nav">
    <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li> -->
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
    </li> -->
    <!-- <a class="nav-link @if($menu=='home') active @endif" href="{{ url('/home') }}">Home</a> -->
    <a class="nav-link @if($menu=='calon-wajib-pajak') active @endif" href="{{ url('/calon-wp') }}">Calon WP</a>
    <!-- <li class="nav-item"><a class="nav-link @if($menu=='materi') active @endif" href="{{ url('/materi') }}">Materi</a></li> -->
    <!-- <a class="nav-link" href="{{ url('/indek') }}">Indek</a> -->
    <!-- <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/kategori-buku') }}">e-Book</a>
            <a class="dropdown-item" href="#">File</a>
            <a class="dropdown-item" href="#">Photo</a>
            <a class="dropdown-item" href="#">Video</a>
        </div>
    </div> -->
    <a class="nav-link @if($menu=='wajib-pajak') active @endif" href="{{ url('/wajib-pajak') }}">Wajib Pajak</a>
    <a class="nav-link @if($menu=='wp-api') active @endif" href="{{ url('/wp-api') }}">WP API</a>
    <a class="nav-link @if($menu=='laporan-harian') active @endif" href="{{ url('/laporan-harian') }}">Laporan Harian</a>
    <!-- <a class="nav-link @if($menu=='about') active @endif" href="{{ url('/about') }}">About</a> -->
    <!-- <a class="nav-link @if($menu=='buku') active @endif" href="{{ url('/buku') }}">Buku</a> -->
</ul>
</div>
</div>
</nav>
<!-- /.navbar -->