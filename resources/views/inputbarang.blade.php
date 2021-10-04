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
            <form role="form" action="/inputservice" method="post" id="inputService">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Unit Sarana</label>
                        <select class="form-control select2" name="sarana" style="width: 100%;">
                            <option selected="selected" value="">-Pilih Sarana-</option>
                            @foreach($data as $d)
                            <option value="{{ $d->id }}">
                                <i>{{ $d->sarana . " - " . "G001" . Str::limit($d->sn ,3 ,"") }}</i>
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger small error-text sarana_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea rows="4" class="form-control  is-invalid" name="deskripsi" placeholder="Deksripsi Barang"></textarea>
                        <span class="text-danger small error-text deskripsi_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Tujuan Pengiriman</label>
                        <select name="tujuan" class="form-control">
                            <option value="">Pilih Tujuan</option>
                            <option>GA</option>
                            <option>LAINNYA</option>
                        </select>
                        <span class="text-danger small error-text tujuan_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Nama PIC</label>
                        <input type="text" name="nama_pic" class="form-control">
                        <span class="text-danger small error-text nama_pic_error"></span>
                    </div>

                    <div class="form-group">
                        <label>NIK PIC</label>
                        <input type="text" name="nik_pic" class="form-control">
                        <span class="text-danger small error-text nik_pic_error"></span>
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