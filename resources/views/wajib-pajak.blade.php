@extends('layout/adminlte3')

@section('title', 'Amrullah AdminLTE 3 | Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Wajib Pajak</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Wajib Pajak</a></li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@if($page=='index')
<!-- Main content -->
<section class="content">
 
<div class="container">
    <div class="row">
    <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Data Wajib Pajak</b></h3>&nbsp;
                <!-- <button type="button" class="btn btn-primary btn-sm btn-flat float-sm-right" data-toggle="modal" data-target="#myModal">Tambah</button> -->
                <!-- <button type="button" class="btn btn-primary btn-sm btn-flat float-sm-right" data-toggle="modal" data-target="#myModal">Tambah</button> -->
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a href="{{route('wajib-pajak.index')}}" class="btn btn-primary btn-sm">
                    Aktif
                </a>
                <a href="{{url('wajib-pajak/status/0')}}" class="btn btn-danger btn-sm">
                    Pasif
                </a>
                </div>
                <a class="btn btn-primary btn-sm btn-flat float-sm-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <i class="fa fa-search"></i> Cari
                </a>
              </div>
              <div id="accordion">
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="card-body">
                <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Klasifikasi Usaha</label>
                    <select class="form-control" name="Jn_Usaha_WP">
                      <option>Klasifikasi Pajak</option>
                      @foreach($jenis_usaha as $jnu)
                      <option value="{{$jnu->Jn_Usaha_WP}}">Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>               
                <div class="col-3">
                  <!-- select -->
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2 select2" name="Kd_Kec" style="width: 100%;">
                      @foreach($kecamatan as $kec)
                      <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label>Kelurahan/Desa</label>
                    <select class="form-control select2 mb-2 select2" name="Kd_Kel">
                      @foreach($kelurahan as $kel)
                      <option value="{{$kel->Kd_Kel}}">{{$kel->Nm_Kel}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Wajib Pajak</label>
                    <input type="text" class="form-control" placeholder="Enter ..." name="Email" value="">
                  </div>
                </div>
                <div class="col-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                </div>
                </div>                  
                </div>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NPWPD/ Nama WP/ <br>Klasifikasi Usaha / Tanggal Aktif</th>
                      <th>Alamat</th>
                      <th>Data Potensi / Omset</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($wajib_pajak as $wp)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$wp->No_Pokok_WP}}<br>
                      {{$wp->Nm_Usaha}}<br>
                      {{$wp->Klasifikasi_Usaha}}<br>
                      {{$wp->Tgl_Aktif}}</td>
                      <td>{{$wp->kecamatan->Nm_Kec}}<br>{{$wp->kelurahan->Nm_Kel}}</td>
                      <td>@isset($wp->potensi)
                      {{$wp->potensi}}<br>
                      @endisset
                      @currency($wp->omset)</td>
                      <td>
                      <div class="btn-group">
                      <a href="{{route('wajib-pajak.edit', $wp->id)}}" class="btn btn-success btn-sm btn-flat float-sm-right" title="Ubah"><i class="fa fa-pencil-alt"></i></a>
                <!-- <button type="button" class="btn btn-success btn-sm btn-flat float-sm-right open_modal" data-toggle="modal" data-target="#myModal-update-{{$loop->iteration}}" title="Ubah">Ubah</button> -->
                <button type="button" class="btn btn-danger btn-sm btn-flat float-sm-right open_modal" data-toggle="modal" data-target="#myModal-delete-{{$loop->iteration}}" title="Hapus"><i class="fa fa-trash-alt"></i></button>
                </div></td>
                    </tr>
                      <div class="modal fade" id="myModal-update-{{$loop->iteration}}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Ubah Calon Wajib Pajak</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <div class="modal fade" id="myModal-delete-{{$loop->iteration}}">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus Calon Wajib Pajak</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="" method="post">
                              @csrf
                              @method('DELETE')
                              Apakah Anda akan Menghapus Data? 
                              <div class="row">
                                <div class="col-sm-5">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Nama WP</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Usaha" value="{{$wp->Nm_Usaha}}">
                                    <input type="hidden" name="id" value="{{$wp->id}}">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                    <label>Klasifikasi Usaha</label>
                                    <select class="form-control" name="Jn_Usaha_WP">
                                      <option>Klasifikasi Pajak</option>
                                      @foreach($jenis_usaha as $jnu)
                                      @if($jnu->Jn_Usaha_WP==$wp->Jn_Usaha_WP)
                                      <option value="{{$jnu->Jn_Usaha_WP}}" selected>Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                                      @else
                                      <option value="{{$jnu->Jn_Usaha_WP}}">Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                                      @endif
                                      @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Omset Penghasilan</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." id="pagu" name="omset" value="{{$wp->omset}}">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>NPWP Usaha</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="NPWP_Usaha" value="{{$wp->NPWP_Usaha}}">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="Email" value="{{$wp->Email}}">
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="No_HP" value="{{$wp->No_HP}}">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Nama Izin</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Izin" value="{{$wp->Nm_Izin}}">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Nomor Izin</label>
                                    <input type="text" class="form-control" placeholder="Enter ..." name="No_Izin" value="{{$wp->No_Izin}}">
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Tanggal Izin</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="Tgl_Izin" value="{{$wp->Tgl_Izin}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-4">
                                  <!-- textarea -->
                                  <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="Alamat_Usaha">{{$wp->Alamat_Usaha}}</textarea>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- select -->
                                  <div class="form-group">
                                    <label>Kecamatan dan Kelurahan/Desa</label>
                                    <select class="form-control select2" name="Kd_Kec" style="width: 100%;">
                                      @foreach($kecamatan as $kec)
                                      @if($kec->Kd_Kec==$wp->Kd_Kec)
                                      <option value="{{$kec->Kd_Kec}}" selected>{{$kec->Nm_Kec}}</option>
                                      @else
                                      <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                    <label></label>
                                    <select class="form-control select2 mb-2" name="Kd_Kel">
                                      @foreach($kelurahan as $kel)
                                      @if($kel->Kd_Kel==$wp->Kd_Kel)
                                      <option value="{{$kel->Kd_Kel}}" selected>{{$kel->Nm_Kel}}</option>
                                      @else
                                      <option value="{{$kel->Kd_Kel}}">{{$kel->Nm_Kel}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- textarea -->
                                  <div class="form-group">
                                    <label>Potensi</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="potensi">{{$wp->potensi}}</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $wajib_pajak->links() }}
              </div>
            </div>
            <!-- /.card -->
          </div>
    
</div>
</div>
</section>
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Calon Wajib Pajak</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('wajib-pajak.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-sm-5">
            <!-- text input -->
            <div class="form-group">
              <label>Nama WP</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Usaha">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Klasifikasi Usaha</label>
              <select class="form-control" name="Jn_Usaha_WP">
                <option>Klasifikasi Pajak</option>
                @foreach($jenis_usaha as $jnu)
                <option value="{{$jnu->Jn_Usaha_WP}}">Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                @endforeach
                </select>
            </div>
          </div>
          <div class="col-sm-3">
            <!-- text input -->
            <div class="form-group">
              <label>Omset Penghasilan</label>
              <input type="text" class="form-control" placeholder="Enter ..." id="pagu" name="omset">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>NPWP Usaha</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="NPWP_Usaha">
            </div>
          </div>
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Email">
            </div>
          </div>
          <div class="col-sm-4">
            <!-- text input -->
            <div class="form-group">
              <label>No. HP</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="No_HP">
            </div>
          </div>
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Izin</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Izin">
            </div>
          </div>
          <div class="col-sm-3">
            <!-- text input -->
            <div class="form-group">
              <label>Nomor Izin</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="No_Izin">
            </div>
          </div>
          <div class="col-sm-3">
            <!-- text input -->
            <div class="form-group">
              <label>Tanggal Izin</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="Tgl_Izin" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <!-- textarea -->
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="Alamat_Usaha"></textarea>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- select -->
            <div class="form-group">
              <label>Kecamatan dan Kelurahan/Desa</label>
              <select class="form-control select2" name="Kd_Kec" style="width: 100%;">
                <option>- Pilih Kecamatan -</option>
                @foreach($kecamatan as $kec)
                <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                @endforeach
              </select>
              <label></label>
              <select class="form-control select2 mb-2" name="Kd_Kel">
                <option>- Pilih Kelurahan -</option>
                @foreach($kelurahan as $kel)
                <option value="{{$kel->Kd_Kel}}">{{$kel->Nm_Kel}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-4">
            <!-- textarea -->
            <div class="form-group">
              <label>Potensi</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="potensi"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@elseif($page=='edit')
<!-- Main content -->
<section class="container">
<div class="row">
    <div class="col-12">
    <div class="card card-success card-outline">
      <div class="card-header">
        <h3 class="card-title">Ubah Data Wajib Pajak</h3>
      </div> <!-- /.card-body -->
      <div class="card-body">
        <form action="{{ route('wajib-pajak.update', $wp->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
              <h5 class="text-success">Profile Wajib Pajak</h5>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama WP</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Usaha" value="{{$wp->Nm_Usaha}}">
              <input type="hidden" name="id" value="{{$wp->id}}">
              <input type="hidden" name="url" value="{{url()->previous()}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Klasifikasi Usaha</label>
              <select class="form-control" name="Jn_Usaha_WP">
                <option>Klasifikasi Pajak</option>
                @foreach($jenis_usaha as $jnu)
                @if($jnu->Jn_Usaha_WP==$wp->Jn_Usaha_WP)
                <option value="{{$jnu->Jn_Usaha_WP}}" selected>Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                @else
                <option value="{{$jnu->Jn_Usaha_WP}}">Pajak {{$jnu->Nm_Jn_Usaha_WP}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-12">
              <h5 class="text-success">NPWP dan Izin Operasional</h5>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>NPWP Usaha</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="NPWP_Usaha" value="{{$wp->NPWP_Usaha}}">
            </div>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Izin</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Izin" value="{{$wp->Nm_Izin}}">
            </div>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nomor Izin</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="No_Izin" value="{{$wp->No_Izin}}">
            </div>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Tanggal Izin</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="Tgl_Izin" value="{{$wp->Tgl_Izin}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-12">
              <h5 class="text-success">Kontak Person</h5>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="Email" value="{{$wp->Email}}">
            </div>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>No. HP</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="No_HP" value="{{$wp->No_HP}}">
            </div>
          </div>
          <div class="col-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="Alamat_Usaha">{{$wp->Alamat_Usaha}}</textarea>
            </div>
          </div>
          <div class="col-6">
            <!-- select -->
            <div class="form-group">
              <label>Kecamatan dan Kelurahan/Desa</label>
              <select class="form-control select2" name="Kd_Kec" style="width: 100%;">
                @foreach($kecamatan as $kec)
                @if($kec->Kd_Kec==$wp->Kd_Kec)
                <option value="{{$kec->Kd_Kec}}" selected>{{$kec->Nm_Kec}}</option>
                @else
                <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                @endif
                @endforeach
              </select>
              <label></label>
              <select class="form-control select2 mb-2" name="Kd_Kel">
                @foreach($kelurahan as $kel)
                @if($kel->Kd_Kel==$wp->kelurahan->Kd_Kel && $kel->Nm_Kel==$wp->kelurahan->Nm_Kel)
                <option value="{{$kel->Kd_Kel}}" selected>{{$kel->Nm_Kel}}</option>
                @else
                <option value="{{$kel->Kd_Kel}}">{{$kel->Nm_Kel}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-12">
              <h5 class="text-success">Status</h5>
          </div>
          <div class="col-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Potensi</label>
              <textarea class="form-control" rows="3" placeholder="Enter ..." name="potensi">{{$wp->potensi}}</textarea>
            </div>
          </div>
          <div class="col-6">
            <!-- text input -->
            <div class="form-group">
              <label>Omset Penghasilan</label>
              <input type="text" class="form-control" placeholder="Enter ..." id="pagu" name="omset" value="{{$wp->omset}}">
            </div>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-success active">
                <input type="radio" name="Status" id="option1" autocomplete="off" value="1" checked> Masih Beroperasi
              </label>
              <label class="btn btn-success">
                <input type="radio" name="Status" id="option2" autocomplete="off" value="0"> Tidak Beroperasi
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="{{url()->previous()}}" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>

      </div><!-- /.card-body -->
    </div>
  </div>
</div>
</section>
<!-- /.content -->



@endif

@endsection
@section('javascript')
<script>
  $(function () {
    $('.select2').select2()
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