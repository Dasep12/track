@extends('template')


@section('content')
@php($role = $role_ )
<div class="row">

  <div class="col-xs-12">
    @if($role == 1)
    {{ 'mode spv' }}
    @elseif($role == 2)
    {{ 'mode support' }}
    @elseif($role == 3)
    {{ 'mode GA' }}
    @endif
    <div class="box box-primary">
      <ul class="nav nav-pills">
        @if($role == 1 || $role == 2)
        <li class="nav-item @if($page == 1) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=1">Menunggu Approved ( {{ $countService }} )</a>
        </li>
        <li class="nav-item @if($page == 2) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=2">Approved ( {{ $countService1 }} )</a>
        </li>
        <li class="nav-item @if($page == 3) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=3">Antrian Service ( {{ $countService2 }} )</a>
        </li>
        <li class="nav-item @if($page == 4) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=4">Proses Service ( {{ $countService3 }} )</a>
        </li>
        <li class="nav-item @if($page == 5) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=5">Selesai Service ( {{ $countService4 }} )</a>
        </li>
        <li class="nav-item @if($page == 6) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=6">
            @if($role == 3)
            {{ 'Sudah Di Kirim ( ' . $countService5 . ' )'}}
            @elseif($role == 2 || $role == 1 )
            {{ 'Sudah Kembali ( ' . $countService5 . ' )'  }}
            @endif
          </a>
        </li>
        @elseif($role == 3)
        <li class="nav-item @if($page == 2) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=2">Approved ( {{ $countService1 }} )</a>
        </li>
        <li class="nav-item @if($page == 3) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=3">Antrian Service ( {{ $countService2 }} )</a>
        </li>
        <li class="nav-item @if($page == 4) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=4">Proses Service ( {{ $countService3 }} )</a>
        </li>
        <li class="nav-item @if($page == 5) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=5">Selesai Service ( {{ $countService4 }} )</a>
        </li>
        <li class="nav-item @if($page == 6) btn-info text-white @endif">
          <a class="nav-link" href="/barang?page=6">
            @if($role == 3)
            {{ 'Sudah Di Kirim ( ' . $countService5 . ' )'}}
            @elseif($role == 2 || $role == 1)
            {{ 'Sudah Kembali (' . $countService5 . ')'  }}
            @endif
          </a>
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
              <th># </th>
              <th width="15%">Aksi</th>
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
                <!-- jika role spv (1) maka tanda approve akan muncul  -->
                @if($role == 1 && $brg->status_approved == "Menunggu Approved" )
                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>' , 'Approved','Approve Permintaan Service')" type="button" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-check"></i><span>Approved Permintaan Service</span> </a>

                <a onclick="javascript:hapus('{{ $brg->id }}', '<?= route('hapusBarang') ?>' , '{{ csrf_token() }}')" class="tip btn btn-danger btn-sm"><i class="fa fa-trash-o"></i><span>Hapus Data Permintaan Service</span> </a>
                @endif

                @if($role == 1 && $brg->status_approved == "Approved" )
                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>','Menunggu Approved','Batalkan Approve')" type="button" class="tip btn btn-danger btn-sm show_confirm"><i class="fa fa-close"></i><span>Batalkan Permintaan Service</span> </a>
                @endif
                <!-- selesai -->


                <!-- jika role support (2) dan barang status approved masih menunggu -->
                <!-- maka tanda hapus aktif -->
                @if($role == 2 && $brg->status_approved == "Menunggu Approved")
                <a onclick="javascript:hapus('{{ $brg->id }}', '<?= route('hapusBarang') ?>' , '{{ csrf_token() }}')" class="tip btn btn-danger btn-sm"><i class="fa fa-trash-o"></i><span>Hapus Data Permintaan Service</span> </a>
                @endif

                @if($role == 2 && $brg->status_approved == "Selesai Service")
                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>' , 'Sudah Di Kirim','Ambil Sarana Service')" type="button" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-check"></i><span>Ambil Sarana</span> </a>
                @endif
                <!-- selesai -->

                <!-- jika role ga (3) status barang approved  -->
                <!-- maka masukan barang ke dalam antrian service -->
                @if($role == 3 && $brg->status_approved == "Approved" )
                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>' ,'Dalam Antrian','Masukan ke Antrian')" type="button" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-check"></i><span>Masukan ke Dalam Antrian Service</span> </a>
                @endif

                <!-- maka masukan barang ke dalam  proses service -->
                @if($role == 3 && $brg->status_approved == "Dalam Antrian" )
                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>' ,'Proses Service' ,'Mulai Service')" type="button" class="tip btn btn-danger btn-sm show_confirm"><i class="fa fa-arrow-right"></i><span>Mulai Proses Service</span> </a>
                @endif

                @if($role == 3 && $brg->status_approved == "Proses Service" )
                <a onclick="javascript:showUsulanMusnah('{{ $brg->id }}', '<?= route('formMusnah') ?>')" type="button" data-toggle="modal" data-target="#usulanMusnah" class="tip btn btn-danger btn-sm show_confirm"><i class="fa fa-reply"></i><span>Usulkan Musnah</span> </a>

                <a onclick="javascript:update('{{ $brg->id }}', '<?= route('updateBarang') ?>' ,'Selesai Service' ,'Proses Service Selesai')" type="button" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-arrow-right"></i><span>Selesaikan Proses Service</span> </a>

                @endif
                <!-- selesai -->

                <button onclick="javascript:showuserdetail('{{ $brg->id }}', '<?= route('loadModal')  ?>' )" data-toggle="modal" data-target="#exampleModal" class="tip btn btn-primary btn-sm"><i class="fa fa-info"></i><span>Detail Permintaan Service</span> </button>
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
<div class="modal" data-keyboard="false" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
      </div>
      <div class="modal-body">
        <div id="contentModal">
          <p id="loadingModal"></p>
          <!-- content modal -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal detail barang -->



<!-- modal usulan musnah -->
<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="usulanMusnah" tabindex="-1" role="dialog" aria-labelledby="usulanMusnahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="usulanMusnahLabel">Usulkan Musnah</h5>
      </div>
      <div class="modal-body">
        <div id="contentModal">
          <form action="<?= route('pemusnahan') ?>" method="post" id="usulkanMusnahBarang">
            <p id="formUsulanMusnah"></p>
            <!-- content modal -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end of modal detail barang -->

@endsection