<form action="{{route('kategori.update',$data->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    @method("PUT")
        <div class='form-group'>
            <label for="">Nama kategori</label>
            <input type="text" class='form-control' name='nmKategori' pleaceholder="Masukan nama kategori" value="{{$data->nama}}" require>
        </div>
        <div>
            <input type="hidden" name='hidden-foto' value="{{$data->foto}}"> 
            <label for="">Foto kategori</label>
            <input type="file" accept="image/*" name='ftKategori' class="form-control add-img" id="" onChange="addImg(event)">
        </div>
        <div >
            <img class="img" src="" alt="" width = 200px height = 200px>
        </div>

        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" >Save</button>
</form>