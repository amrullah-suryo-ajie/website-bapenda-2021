@extends('layout/adminlte3')

@section('title', 'SIMPEDA 1.0 | Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard <small>SIMPEDA 1.0</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
 
<div class="container">
    <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><strong>Sistem Informasi Manajemen Pajak Daerah Pemerintah Kabupaten Brebes</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- <p>Sistem Informasi Manajemen Pajak Daerah Pemerintah Kabupaten Brebes</p> -->
            <ul class="chart-legend clearfix">
              <li><i class="far fa-circle text-danger"></i> Pendaftaran Calon Wajib Pajak</li>
              <li><i class="far fa-circle text-success"></i> Data Wajib Pajak</li>
              <li><i class="far fa-circle text-warning"></i> API Data Wajib Pajak SIMDA PENDAPATAN</li>
              <!-- <li><i class="far fa-circle text-info"></i> Safari</li>
              <li><i class="far fa-circle text-primary"></i> Opera</li>
              <li><i class="far fa-circle text-secondary"></i> Navigator</li> -->
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
</div>
</section>
</div>
<!-- /.content-wrapper -->
@endsection