@extends('template')

@section('content')
@if(Session('success'))
<div class="alert alert-info">
    <span>{{"berhasil upload" }}</span>
</div>
@endif
<form action="/upload" method="post" enctype="multipart/form-data">
    <label>Upload File</label>
    @csrf
    <div class="form-group">
        <input type="file" name="file">
    </div>
    <button type="submit" class="btn btn-danger">Upload</button>
</form>
@endsection