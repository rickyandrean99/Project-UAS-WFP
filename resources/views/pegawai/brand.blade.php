<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body>
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
                                    <th>Nama</th>
                                    <th></th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $brand)
                                    <tr>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->nama}}</td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reset-pass" onclick="getData($brand->id)"  href="#">Edit</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='if(confirm("Yakin untuk merubah activasi pegawai ini??")) suspend({{$brand->id}})'>Delete</a></li>
                                                </ul>
                                            </div>  
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        <form action="{{route('brand.store')}}" method='post'>
                   @csrf
                    <div class='form-group'>
                        <label for="">Nama brand</label>
                        <input type="text" class='form-control' name='nmBrand' pleaceholder="Masukan nama brand" require>
                    </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" >Save change</button>
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
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<script>

    function getData(id){
        $.ajax({
            type:'POST',
            url:'{{route("brand.data")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                
            }
        }); 
    }

</script>
</body>
</html>