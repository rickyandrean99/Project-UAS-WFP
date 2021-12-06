@extends('pegawai.layout')

@section('title')
    <title>Produk</title>
@endsection

@section('content')
<div class="container">
    <div class="container-fluid">
    @if(session('status'))
    <div class='alert alert-success'>
        {{session('status')}}
    </div>
    @endif
    @if(session('error'))
        <div class='alert alert-danger'>
            {{session('error')}}
        </div>
    @endif
        <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Produk</div>
        <div class="row">
            <div class="col-md-10">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Produk</button>
            </div>
            <div class='card'>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Brand</th>
                                <th>Harga</th>
                                <th></th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $p)
                                <tr id="tr-{{$p->id}}">
                                    <td ><img src="{{ asset('images/produk/'.$p->foto.'') }}" alt="" class="w-100"></td>
                                    <td>{{$p->nama}}</td>
                                    <td >{{$p->kategori->nama}}</td>
                                    <td >{{$p->brand->nama}}</td>
                                    <td >{{$p->Harga}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="getData({{$p->id}})" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='deletes({{$p->id}})' href="#">Delete</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='detail({{$p->id}})' href="#">Detail</a></li>
                                            </ul>
                                        </div>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produk->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('produk.store')}}" method='post' enctype="multipart/form-data">
                   @csrf
                    <div class='form-group'>
                        <label for="">Nama Produk</label>
                        <input type="text" class='form-control' name='nmProduk' pleaceholder="Masukan nama produk" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Harga</label>
                        <input type="number" class='form-control' name='hrgProduk' require>
                    </div>
                    <div class='form-group'>
                        <label for="">Brand</label>
                        <select name="brand" id="" class="form-control">
                            <option value="">Pilih brand produk</option>
                            @foreach ($brand as $b)
                                <option value="{{$b->id}}">{{$b->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for="">Kategori</label>
                        <select name="kategori" id="" class="form-control" >
                            <option value="">Pilih kategori produk</option>
                            @foreach ($kategori as $k)
                                <option value="{{$k->id}}">{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for="">Spesifikasi</label>
                        <textarea class="form-control" name='spek' id="reason" rows="3"></textarea>
                    </div>
                    <div>
                        <label for="">Foto Produk</label>
                        <input type="file" accept="image/*" name='ftProduk' class="form-control" id="add-img" onChange="addImg(event)" >
                    </div>
                    <div >
                        <img class="img w-100" src="" alt="">
                    </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" >Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- modal -->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdl-header">Pemberitahuan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id='mdl-body'>
        
      </div>
      <div class="modal-footer" id='mdl-footer'>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('ajaxquery')
    <script>
        $(document).ready(function(){
            $('.nav-item').removeClass('active');
            $('#produk').addClass('active');
        });

        function addImg(event){ 
            var file = event.target.files[0];
            var reader = new FileReader();
            if(file == undefined || file.length == 0) return;
            reader.onload = function(e) {
                $('.img').attr("src", e.target.result);
            } 
            
            reader.readAsDataURL(file);
            
        }

        function getData(id){
            $.ajax({
            type:'POST',
            url:'{{route("produk.data")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#modal-dialog').removeClass('modal-lg');
                $('#mdl-header').html('Update produk');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('');
                // $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                // <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-bs-dismiss="modal" onclick='update()'>Submit</button>`);
            }
            }); 
        }

        function update(){
            // alert('dor');
            var id = $('#edit-id').val();
            var nama = $('#edit-name').val();
            var foto = $('#edit-foto').val();

            $.ajax({
            type:'POST',
            url:'{{route("brand.updateBrand")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'nama':nama,
                'foto': foto
            },
            success:function(data){
                $('#modal-dialog').removeClass('modal-lg');
                $('#mdl-header').html('Pemberitahuan');
                if(data.status == 'ok'){
                    $('#mdl-body').html("Data brand berhasil di update");
                    $('#nama-'+id).html(data.nama);
                    if(data.foto != ""){
                        $('#foto-'+id).html(data.foto);
                    }
                }
                else{
                    $('#mdl-body').html("Data brand gagal di update, silahkan mencoba kembali");
                }
                $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>`);
            }
            }); 

        }

        function deletes(id){
            $('#modal-dialog').removeClass('modal-lg');
            $('#mdl-header').html('Pemberitahuan');
            $('#mdl-body').html('Apakah yakin menghapus produk ini??');
            $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-dismiss="modal" onclick='dltProduk(`+id+`)'>Yes</button>`);
        }

        function dltProduk(id){
            $.ajax({
            type:'POST',
            url:'{{route("produk.dltProduk")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#modal-dialog').removeClass('modal-lg');
                $('#mdl-body').html('');
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> ');
                if(data.status=='ok'){
                    $('#mdl-body').html('Produk berhasil dihapus');
                    $('#tr-'+id).remove();
                }
                else{
                    $('#mdl-body').html('Produk gagal dihapus, silahkan dicoba kembali');
                }
            }
        }); 
        }

        
        function detail(id){
            $.ajax({
            type:'POST',
            url:'{{route("produk.detail")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#modal-dialog').addClass('modal-lg');
                $('#mdl-header').html('Detail produk');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>');
            }
        }); 
        }

       
    </script>
@endsection