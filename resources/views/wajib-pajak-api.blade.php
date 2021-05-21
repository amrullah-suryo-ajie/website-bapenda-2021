@extends('layout/adminlte3')

@section('title', 'Amrullah AdminLTE 3 | Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-flu+id">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3 class="card-title">Data Wajib Pajak</h3>
                <button type="button" class="btn btn-primary btn-sm btn-flat float-sm-right" data-toggle="modal" data-target="#myModal">Tambah</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th width="5%">NO</th>
                      <th width="20%">NPWPD</th>
                      <th width="25%">Nama WP</th>
                      <th width="20%">Klasifikasi Usaha</th>
                      <th width="40%">Alamat</th>
                      <!-- <th>Alamat</th> -->
                      <!-- <th>Data Potensi / Omset</th> -->
                      <!-- <th>Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data1 as $wp)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$wp['npwpd']}}</td>
                      <td>{{$wp['namaWp']}}</td>
                      <td>{{$wp['jnsPajak']}}</td>                  
                      <td>{{$wp['jalan']}}</td>                  
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    
</div>
</div>
</section>

@endsection
@section('javascript')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection