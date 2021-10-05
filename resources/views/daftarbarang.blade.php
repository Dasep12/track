@extends('template')


@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <ul class="nav nav-pills">
        <li class="nav-item ">
          <a class="nav-link  text-white" href="#">Menunggu Approved ( 10 ) {{ $page }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Antrian Service ( 10 )</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Proses Service ( 10 )</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Selesai Service ( 10 )</a>
        </li>
      </ul>
      <div class="box-header">
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 4.0
              </td>
              <td>Win 95+</td>
              <td> 4</td>
              <td>X</td>
            </tr>

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