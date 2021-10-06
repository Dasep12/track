@extends('template')


@section('content')
<div class="row">

  <div class="col-xs-12">
    <div class="box box-primary">
      <ul class="nav nav-pills">
        @php($role = 1)
        @if($role == 1 || $role == 2)
        <li class="nav-item @if($page == 1) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=1">Menunggu Approved ( )</a>
        </li>
        <li class="nav-item @if($page == 2) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=2">Approved ( )</a>
        </li>
        <li class="nav-item @if($page == 3) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=3">Antrian Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 4) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=4">Proses Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 5) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=5">Selesai Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 6) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=6">Sudah Di Kirim ( 10 )</a>
        </li>
        @elseif($role == 3)
        <li class="nav-item @if($page == 2) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=2">Approved ( )</a>
        </li>
        <li class="nav-item @if($page == 3) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=3">Antrian Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 4) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=4">Proses Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 5) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=5">Selesai Service ( 10 )</a>
        </li>
        <li class="nav-item @if($page == 6) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=6">Sudah Di Kirim ( 10 )</a>
        </li>
        @endif

      </ul>
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Aksi</th>
              <th>Status</th>
              <th>Unit</th>
              <th>Aktiva</th>
              <th>SN</th>
              <th>Tanggal Kirim</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1 )
            @foreach($daftar_barang as $brg)
            <tr>
              <td>{{ $no++ }}</td>
              <td>
                @if($role == 1 && $brg->status_approved == "Menunggu Approved" )
                <a href="#" class="tip btn btn-success btn-sm"><i class="fa fa-check"></i><span>Approved Permintaan Service</span> </a>
                @endif
                <!-- jika role 2 dan barang status approved masih menunggu -->
                <!-- maka tanda hapus aktif -->
                @if($role == 2 && $brg->status_approved == "Menunggu Approved")
                <a href="#" class="tip btn btn-danger btn-sm"><i class="fa fa-trash-o"></i><span>Hapus Data Permintaan Service</span> </a>
                @endif

                <a onclick="javascript:showuserdetail('{{ $brg->id }}')" data-toggle="modal" data-target="#exampleModal" class="tip btn btn-primary btn-sm"><i class="fa fa-info"></i><span>Detail Permintaan Service</span> </a>
              </td>
              <td>
                <label class="label
                @if($page == 1)
                label-warning
                @elseif($page == 2)
                label-info
                @elseif($page == 3)
                label-primary
                @elseif($page == 4 )
                label-success
                @elseif($page == 5)
                label-danger
                @elseif($page == 6)
                label-primary
                @endif
                ">{{ $brg->status_approved }}</label>
              </td>
              <td>{{$brg->sarana}}</td>
              <td> {{ $brg->aktiva }}</td>
              <td>{{ $brg->sn }}</td>
              <td>{{ $brg->tanggal_kirim }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- modal detail barang -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contentModal">
          <p id="loadingModal"></p>
          <!-- content modal -->
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal detail barang -->

<script>
  //tampilkan data barang service di modal lewat ajax request
  function showuserdetail(id) {
    $.ajax({
      type: "post",
      method: "get",
      url: "<?= route('loadModal')  ?>",
      data: "id=" + id,
      dataType: "html",
      beforeSend: function() {
        $("loadingModal").append('sedang mengambil data . . . ');
      },
      success: function(response) {
        // $('#bodymodal_userDetail').empty();
        $('#contentModal').empty();
        $('#contentModal').append(response);
      },
      complete() {
        $("loadingModal").append('');
      }
    });
  }
</script>
@endsection