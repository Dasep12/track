@extends('template')



@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Sarana</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/addsarana" method="post" id="addsarana">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Kode Gudang</label>
                        <input type="text" name="kode_dc" class="form-control">
                        <span class="text-danger small error-text kode_dc_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Departement</label>
                        <input type="text" name="departement" class="form-control">
                        <span class="text-danger small error-text departement_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Unit Sarana</label>
                        <input type="text" name="sarana" class="form-control">
                        <span class="text-danger small error-text sarana_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Aktiva</label>
                        <input type="text" name="aktiva" class="form-control">
                        <span class="text-danger small error-text aktiva_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Serila Number</label>
                        <input type="text" name="sn" class="form-control">
                        <span class="text-danger small error-text sn_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Tahun Perolehan</label>
                        <input type="text" name="tahun_perolehan" class="form-control">
                        <span class="text-danger small error-text tahun_perolehan_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Status Sarana</label>
                        <select name="status" class="form-control">
                            <option value="">Pilih status</option>
                            <option>AKTIF</option>
                            <option>SERVICE</option>
                        </select>
                        <span class="text-danger control-label small error-text status_error"></span>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                    <a href="/upload" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Upload Excel</a>
                </div>
            </form>
        </div>
        <!-- /.box -->
        <!-- <div class="form-group has-error">
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                error</label>
            <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
            <span class="help-block">Help block with error</span>
        </div> -->
        @endsection