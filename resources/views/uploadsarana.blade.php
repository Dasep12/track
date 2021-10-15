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

<div class="alert alert-warning">
    *Prerequisite upload data sarana*
    <ul>
        <li>Pastikan file yang di upload berupa <b>CSV</b></li>
        <li>Serial Number yang sudah akan otomatis di tolak sistem</li>
    </ul>
</div>
<form action="/upload" method="post" enctype="multipart/form-data">
    <label>Upload File</label>
    @csrf
    <div class="form-group">
        <input type="file" onchange="return exe()" id="fileUpload" name="file" class="form-control">

        {{ $errors->all() }}
    </div>
    <button type="submit" class="btn btn-danger">Upload</button>
</form>
@endsection

<script>
    function exe() {
        var file = document.getElementById("fileUpload");
        var path = file.value;
        var exe = /(\.csv|\.CSV)$/i;
        if (!exe.exec(path)) {
            alert("error");
            file.value = "";
            return;
        }
    }
</script>