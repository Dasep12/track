@extends('template')



@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/inputsarana" method="post" id="inputService">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Unit Sarana</label>
                        <select class="form-control select2" name="sarana" style="width: 100%;">
                            <option selected="selected" value="">-Pilih Sarana-</option>
                            <option value="">HANDHELD - 135 </option>
                            <option>SCANNER - 134 </option>
                            <option>WACOM - 344 </option>
                            <option>CPU - 666 </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="4" class="form-control" name="keterangan" placeholder="Deksripsi Barang"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tujuan Pengiriman</label>
                        <select name="tujuan" class="form-control">
                            <option>GA</option>
                            <option>LAINNYA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama PIC</label>
                        <input type="text" name="nama_pic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NIK PIC</label>
                        <input type="text" name="nik_pic" class="form-control">
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

        @endsection