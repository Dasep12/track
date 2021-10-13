@extends('template')


@section('content')
@php($role = 1)
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
                <li class="nav-item @if($page == 1) btn-info text-white @endif">
                    <a class="nav-link" href="/musnah?page=1">Usulan Musnah ( {{ 0 }} )</a>
                </li>
                <li class="nav-item @if($page == 2) btn-info text-white @endif">
                    <a class="nav-link" href="/musnah?page=2">Musnah ( )</a>
                </li>
            </ul>
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># </th>
                            <th width="15%">No Antrian</th>
                            <th width="15%">Aksi</th>
                            <th>Status</th>
                            <th>Unit</th>
                            <th>Aktiva</th>
                            <th>SN</th>
                            <th>Alasan Musnah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1 )
                        @foreach($daftar_barang as $brg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $brg->no_antrian }}</td>
                            <td>

                                <!-- jika role spv (1) maka tanda approve akan muncul  -->
                                @if($role == 1 && $brg->status_approved == "Usulan Musnah" )
                                <a onclick="javascript:accmusnah('{{ $brg->id }}', '<?= route('accMusnah') ?>' ,'Setujui Pemusnahan Barang','{{ csrf_token() }}')" type="button" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-check"></i><span>Acc Pemusnahan Barang</span> </a>

                                <a onclick="javascript:hapus('{{ $brg->id }}', '<?= route('updateBarang') ?>' , '{{ csrf_token() }}')" class="tip btn btn-danger btn-sm"><i class="fa fa-trash-o"></i><span>Batalkan Pemusnahan</span> </a>
                                @endif
                            </td>
                            <td>{{$brg->status_approved }}</td>
                            <td>{{$brg->sarana}}</td>
                            <td> {{ $brg->aktiva }}</td>
                            <td>{{ $brg->sn }}</td>
                            <td>{{ $brg->info }}</td>
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
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- end of modal detail barang -->

<script>

</script>
@endsection