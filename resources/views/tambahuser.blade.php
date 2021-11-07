@extends('template')



@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/addUser" method="post" id="addUser">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Kode Gudang</label>
                        <input type="text" value="{{ $dc }}" readonly name="kode_dc" class="form-control">
                        <span class="text-danger small error-text kode_dc_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" class="form-control">
                        <span class="text-danger small error-text name_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        <span class="text-danger small error-text email_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Role User</label>
                        <select name="role" class="form-control">
                            <option value="">Pilih</option>
                            <option value="1">SPV</option>
                            <option value="2">Support</option>
                            <option value="3">GA</option>
                        </select>
                        <span class="text-danger small error-text role_error"></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="text-danger small error-text password_error"></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password1" class="form-control">
                        <span class="text-danger small error-text password1_error"></span>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
        @endsection