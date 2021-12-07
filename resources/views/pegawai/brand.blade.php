@extends('pegawai.layout')

@section('title')
    <title>Brand</title>
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
        <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Brand</div>
        <div class="row">
            <div class="col-md-10">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Brand</button>
            </div>
            <div class='card'>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th></th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $brand)
                                <tr id="tr-{{$brand->id}}">
                                    <td >{{$brand->id}}</td>
                                    <td style="width:20%;"><img src="{{ asset('images/logo/'.$brand->foto.'') }}" alt="" class="w-100"></td>
                                    <td id="nama-{{$brand->id}}">{{$brand->nama}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="getData({{$brand->id}})" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='deletes({{$brand->id}},"{{$brand->foto}}")' href="#">Delete</a></li>
                                            </ul>
                                        </div>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $query->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



<!-- modal add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Brand</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('brand.store')}}" method='post' enctype="multipart/form-data">
                   @csrf
                    <div class='form-group'>
                        <label for="">Nama brand</label>
                        <input type="text" class='form-control' name='nmBrand' pleaceholder="Masukan nama brand" require>
                    </div>
                    <div>
                        <label for="">Foto Brand</label>
                        <input type="file" accept="image/*" name='ftBrand' class="form-control" id="add-img" onChange="addImg(event)" >
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
  <div class="modal-dialog">
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
            $('#brand').addClass('active');
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
            url:'{{route("brand.data")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#mdl-header').html('Update Brand');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('');
                // $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                // <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-bs-dismiss="modal" onclick='update()'>Submit</button>`);
            }
            }); 
        }

    

        function deletes(id,foto){
            $('#mdl-header').html('Pemberitahuan');
            $('#mdl-body').html('Apakah yakin menghapus brand ini?');
            $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-default"  data-bs-dismiss="modal" onclick='dltBrand(`+id+`,"`+foto+`")'>Yes</button>`);
        }

        function dltBrand(id,foto){
            $.ajax({
            type:'POST',
            url:'{{route("brand.dltBrand")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'foto': foto
            },
            success:function(data){
                $('#mdl-body').html('');
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> ');
                if(data.status=='ok'){
                    $('#mdl-body').html('Brand berhasil dihapus');
                    $('#tr-'+id).remove();
                }
                else{
                    $('#mdl-body').html('Brand gagal dihapus, silahkan dicoba kembali');
                }
                $('#modalInfo').modal('show');
            }
        }); 
        }

       
    </script>
@endsection