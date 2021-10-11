@csrf
<label>Keterangan</label>
<div class="form-group">
    <input class="form-control" type="hidden" name="id" id="idBarmus" value="{{ $id }}">
    <textarea rows="5" placeholder="Beri Keterangan Mengapa di Usulkan Musnah" class="form-control" name="info"></textarea>
    <span class="text-danger small error-text info_error"></span>
</div>

<!-- <div class="form-group">
    <button class="btn btn-info" type="button"><i class="fa fa-save"></i> usulkan musnah</button>
</div> -->