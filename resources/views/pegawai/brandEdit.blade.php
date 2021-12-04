<form action="{{route('brand.update',$data->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class='form-group'>
            <label for="">Nama brand</label>
            <input type="text" class='form-control' name='nmBrand' pleaceholder="Masukan nama brand" value="{{$data->nama}}" require>
        </div>
        <div>
            <input type="hidden" name='hidden-foto' value="{{$data->foto}}"> 
            <label for="">Foto Brand</label>
            <input type="file" accept="image/*" name='ftBrand' class="form-control add-img" id="" onChange="addImg(event)">
        </div>
        <div >
            <img class="img" src="" alt="">
        </div>

        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" >Save</button>
</form>