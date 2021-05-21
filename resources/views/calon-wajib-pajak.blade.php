@extends('layout/adminlte3')

@section('title', 'SIMPEDA 1.0 | Calon WP')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Calon Wajib Pajak</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
          <li class="breadcrumb-item active">Calon WP</li>
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
          <h2 class="card-title"><b>Data Calon Wajib Pajak</b></h2>
          <button type="button" class="btn btn-primary btn-sm btn-flat float-sm-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Tambah</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama WP / NPWP / Klasifikasi Usaha</th>
                <th>Izin Usaha</th>
                <th>Alamat</th>
                <th>Data Potensi / Omset</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($calon_wp as $cwp)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                {{$cwp->Nm_Usaha}}
                @isset($cwp->NPWP_Usaha)
                <br>NPWP : {{$cwp->NPWP_Usaha}}
                @endisset
                <br>({{$cwp->Jn_Usaha_WP}}) {{$cwp->Klasifikasi_Usaha}}
                @isset($cwp->Email)
                <br>Email : {{$cwp->Email}}
                @endisset
                @isset($cwp->No_HP)
                <br>HP : {{$cwp->No_HP}}
                @endisset
                </td>
                <td>{{$cwp->Nm_Izin}}<br>{{$cwp->No_Izin}}<br>{{$cwp->Tgl_Izin}}</td>
                <td>
                @isset($cwp->Alamat_Usaha)
                {{$cwp->Alamat_Usaha}}<br>
                @endisset
                @isset($cwp->Kd_Kec)
                {{$cwp->kecamatan->Nm_Kec}}<br>
                @endisset
                @isset($cwp->Kd_Kel)
                @foreach($cwp->kelurahan as $kel)
                @if($kel->Kd_Kel==$cwp->Kd_Kel)
                {{$kel->Nm_Kel}}
                @endif
                @endforeach
                @endisset
                </td>
                <td>
                @isset($cwp->potensi)
                {{$cwp->potensi}}<br>
                @endisset
                @currency($cwp->omset)</td>
                <td><div class="btn-group">
                <button type="button" class="btn btn-success btn-sm btn-flat float-sm-right open_modal" data-toggle="modal" data-target="#myModal-update-{{$loop->iteration}}" title="Ubah"><i class="fa fa-pencil-alt"></i></button>
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
                    <form action="{{ route('calon-wp.update', $cwp->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-sm-5">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama WP</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Usaha" value="{{$cwp->Nm_Usaha}}">
                            <input type="hidden" name="id" value="{{$cwp->id}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Klasifikasi Usaha</label>
                            <select class="form-control" name="Jn_Usaha_WP">
                              <option>Klasifikasi Pajak</option>
                              @foreach($jenis_usaha as $jnu)
                              @if($jnu->Jn_Usaha_WP==$cwp->Jn_Usaha_WP)
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
                            <input type="text" class="form-control" placeholder="Enter ..." id="pagu" name="omset" value="{{$cwp->omset}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>NPWP Usaha</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="NPWP_Usaha" value="{{$cwp->NPWP_Usaha}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Email" value="{{$cwp->Email}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="No_HP" value="{{$cwp->No_HP}}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama Izin</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Izin" value="{{$cwp->Nm_Izin}}">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nomor Izin</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="No_Izin" value="{{$cwp->No_Izin}}">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Tanggal Izin</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="Tgl_Izin" value="{{$cwp->Tgl_Izin}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/>
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
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="Alamat_Usaha">{{$cwp->Alamat_Usaha}}</textarea>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- select -->
                          <div class="form-group">
                            <label>Kecamatan dan Kelurahan/Desa</label>
                            <select class="form-control select2" name="Kd_Kec" style="width: 100%;">
                              @foreach($kecamatan as $kec)
                              @if($kec->Kd_Kec==$cwp->Kd_Kec)
                              <option value="{{$kec->Kd_Kec}}" selected>{{$kec->Nm_Kec}}</option>
                              @else
                              <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                              @endif
                              @endforeach
                            </select>
                            <label></label>
                            <select class="form-control select2 mb-2" name="Kd_Kel">
                              @foreach($kelurahan as $kel)
                              @if($kel->Kd_Kec==$cwp->Kd_Kec && $kel->Kd_Kel==$cwp->Kd_Kel)
                              <option value="{{$kel->Kd_Kel}}" selected>{{$kel->Nm_Kel}}</option>
                              @else
                              <option value="{{$kel->Kd_Kel}}">{{$kel->Kd_Kel}}. {{$kel->Nm_Kel}}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Potensi</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="potensi">{{$cwp->potensi}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                    </form>
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
                    <form action="{{ route('calon-wp.destroy',$cwp->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      Apakah Anda akan Menghapus Data? 
                      <div class="row">
                        <div class="col-sm-5">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama WP</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Usaha" value="{{$cwp->Nm_Usaha}}">
                            <input type="hidden" name="id" value="{{$cwp->id}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Klasifikasi Usaha</label>
                            <select class="form-control" name="Jn_Usaha_WP">
                              <option>Klasifikasi Pajak</option>
                              @foreach($jenis_usaha as $jnu)
                              @if($jnu->Jn_Usaha_WP==$cwp->Jn_Usaha_WP)
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
                            <input type="text" class="form-control" placeholder="Enter ..." id="pagu" name="omset" value="{{$cwp->omset}}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>NPWP Usaha</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="NPWP_Usaha" value="{{$cwp->NPWP_Usaha}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Email" value="{{$cwp->Email}}">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="No_HP" value="{{$cwp->No_HP}}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nama Izin</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Nm_Izin" value="{{$cwp->Nm_Izin}}">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nomor Izin</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="No_Izin" value="{{$cwp->No_Izin}}">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Tanggal Izin</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="Tgl_Izin" value="{{$cwp->Tgl_Izin}}" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/>
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
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="Alamat_Usaha">{{$cwp->Alamat_Usaha}}</textarea>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- select -->
                          <div class="form-group">
                            <label>Kecamatan dan Kelurahan/Desa</label>
                            <select class="form-control select2" name="Kd_Kec" style="width: 100%;">
                              @foreach($kecamatan as $kec)
                              @if($kec->Kd_Kec==$cwp->Kd_Kec)
                              <option value="{{$kec->Kd_Kec}}" selected>{{$kec->Nm_Kec}}</option>
                              @else
                              <option value="{{$kec->Kd_Kec}}">{{$kec->Nm_Kec}}</option>
                              @endif
                              @endforeach
                            </select>
                            <label></label>
                            <select class="form-control select2 mb-2" name="Kd_Kel">
                              @foreach($kelurahan as $kel)
                              @if($kel->Kd_Kel==$cwp->Kd_Kel)
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
                            <textarea class="form-control" rows="3" placeholder="Enter ..." name="potensi">{{$cwp->potensi}}</textarea>
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
      <form action="{{ route('calon-wp.store') }}" method="post">
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
              <select class="form-control select2 mb-2" name="Id_Kel">
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
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('javascript')
<script>
  $(document).on('click','.open_modal',function(){
      var url = "domain.com/yoururl";
      var tour_id= $(this).val();
      $.get(url + '/' + tour_id, function (data) {
          //success data
          console.log(data);
          $('#tour_id').val(data.id);
          $('#name').val(data.name);
          $('#details').val(data.details);
          $('#btn-save').val("update");
          $('#myModal').modal('show');
      }) 
  });
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
  
  $('#pagu').inputmask({
        alias: 'numeric',
        autoGroup: true,
        groupSeparator: '.',
        rightAlign: false,
        digitsOptional: true,
        digits: 2,
        prefix: 'IDR ',
        allowMinus: true,
        autoUnmask: true,
        removeMaskOnSubmit: true
    });
    $('.select2').select2()
  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
  $('[data-mask]').inputmask();
  //Date range picker
  $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  
</script>
@endsection