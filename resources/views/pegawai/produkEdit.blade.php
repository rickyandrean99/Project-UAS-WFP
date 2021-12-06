<form action="{{route('produk.update',$produk->id)}}" method='post' enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class='form-group'>
                        <label for="">Nama Produk</label>
                        <input type="text" class='form-control' name='nmProduk' value="{{$produk->nama}}" pleaceholder="Masukan nama produk" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Harga</label>
                        <input type="number" class='form-control' name='hrgProduk' value="{{$produk->harga}}" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Brand</label>
                        <select name="brand" id="" class="form-control">
                            <option value="">Pilih brand produk</option>
                            @foreach ($brand as $b)
                                @if($b->nama == $produk->brand->nama)
                                    <option value="{{$b->id}}" selected>{{$b->nama}}</option>
                                @else
                                    <option value="{{$b->id}}" >{{$b->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for="">Kategori</label>
                        <select name="kategori" id="" class="form-control" >
                            <option value="">Pilih kategori produk</option>
                            @foreach ($kategori as $k)
                                @if($k->nama == $produk->kategori->nama)
                                    <option value="{{$k->id}}" selected>{{$k->nama}}</option>
                                @else
                                    <option value="{{$k->id}}" >{{$k->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for="">Spesifikasi</label>
                        <textarea class="form-control" name='spek' id="reason" rows="3" >{{$produk->spesifikasi}}</textarea>
                    </div>
                    <div>
                        <input type="hidden" name='hidden-foto' value="{{$produk->foto}}">
                        <label for="">Foto Produk</label>
                        <input type="file" accept="image/*" name='ftProduk' class="form-control" id="add-img" onChange="addImg(event)" >
                    </div>
                    <div >
                        <img class="img w-100" src="" alt="">
                    </div>

        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" >Save</button>
</form>