@extends('template')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># </th>
                            <th width="15%">Aksi</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1 )
                        @foreach($user as $usr)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <a href="#" class="tip btn btn-info btn-sm show_confirm"><i class="fa fa-eye"></i><span>detail sarana</span> </a>
                                <a href="#" class="tip btn btn-danger btn-sm show_confirm"><i class="fa fa-trash"></i><span>hapus sarana</span> </a>
                                <a href="#" class="tip btn btn-success btn-sm show_confirm"><i class="fa fa-edit"></i><span>edit sarana</span> </a>
                            </td>
                            <td>{{ $usr->user }}</td>
                            <td>{{ $usr->role }}</td>
                            <td>{{ $usr->email }}</td>
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

@endsection