<form action="{{route('brand.store',$data->id)}}" method='post'>
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
</form>