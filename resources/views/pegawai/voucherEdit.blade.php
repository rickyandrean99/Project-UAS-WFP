<form action="{{route('voucher.update',$voucher->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class='form-group'>
            <label for="">Kode Voucher</label>
            <input type="text" class='form-control' name='kdVoucher' pleaceholder="Masukan kode voucher" value="{{$voucher->kode}}" require>
        </div>
        <div>
            <label for="">Diskon</label>
            <input type="number" name='discVoucher' class="form-control" min=0 max=100 value="{{$voucher->discount}}" require>
        </div>

        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" >Save</button>
</form>