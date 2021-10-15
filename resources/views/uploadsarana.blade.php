@extends('template')

@section('content')
@if(Session('success'))
<div class="alert alert-info">
    <span> {{ Session('success') }} </span>
</div>

@elseif(Session('info'))
<div class="alert alert-danger">
    <span> {{ Session('info') }} </span>
</div>
@endif
<form action="/upload" method="post" enctype="multipart/form-data">
    <label>Upload File</label>
    @csrf
    <div class="form-group">
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-danger">Upload</button>
</form>
@endsection