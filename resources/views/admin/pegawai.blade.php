<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
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
            <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Pegawai</div>
            <div class="row">
                <div class="col-md-10">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pegawai</button>
                </div>
                <div class='card'>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    <th></th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $pegawai)
                                    <tr>
                                        <td>{{$pegawai->name}}</td>
                                        <td>{{$pegawai->email}}</td>
                                        @if($pegawai->active == true)
                                            <td id="active-{{$pegawai->id}}">active</td>
                                        @else
                                            <td id="active-{{$pegawai->id}}">Suspend</td>
                                        @endif
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reset-pass" onclick="getId({{$pegawai->id}})" href="#">Reset Password</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='if(confirm("Yakin untuk merubah activasi pegawai ini??")) suspend({{$pegawai->id}})'>Activasion</a></li>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('pegawai.store')}}" method='post'>
                   @csrf
                    <div class='form-group'>
                        <label for="">Nama Pegawai</label>
                        <input type="text" class='form-control' name='nmPegawai' pleaceholder="Masukan nama pegawai" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Email Pegawai</label>
                        <input type="email" class='form-control' name='emailPegawai' pleaceholder="Masukan email pegawai" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Password Pegawai</label>
                        <input type="password" class='form-control' name='passPegawai' pleaceholder="Masukan password pegawai" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Konfirmasi Password</label>
                        <input type="password" class='form-control' name='konfirmasiPass' pleaceholder="Masukan password pegawai kembali" require>
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
        <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
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

<!-- modal reset password -->
<div class="modal fade" id="reset-pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id='mdl-body'>
          <input type="hidden" value='' id="perawai-id">
        <div class='form-group'>
            <label for="">Password Baru</label>
            <input type="password" class='form-control' id="passBaru" name='passPegawai' pleaceholder="Masukan password baru pegawai" >
        </div>
        <div class='form-group'>
            <label for="">Konfirmasi Password</label>
            <input type="password" class='form-control' id="konfirmasiPass" name='konfirmasiPass' pleaceholder="Masukan password pegawai kembali" >
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-dismiss="modal" onclick='resetPass()'>Submit</button>
      </div>
      
    </div>
  </div>
</div>

<script>
    function suspend(id){
        $.ajax({
            type:'POST',
            url:'{{route("pegawai.suspend")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                if(data.status=='ok'){
                    $('#mdl-body').html('Aktivasi Pegawai berhasil diubah');
                }
                else{
                    $('#mdl-body').html('Perubahan gagal, silahkan dicoba kembali');
                }
                $('#active-'+id).html(data.act);
            }
        }); 
    }

    function getId(id){
        $('#perawai-id').val(id);
        $('#passBaru').val("");
        $('#konfirmasiPass').val("");
    }

    function resetPass(){
        var id = $('#perawai-id').val();
        var pass = $('#passBaru').val();
        var rePass = $('#konfirmasiPass').val();
        $.ajax({
            type:'POST',
            url:'{{route("pegawai.reset")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'pass': pass,
                'rePass': rePass
            },
            success:function(data){
                $('#mdl-body').html(data.msg);
            }
        });
    }
</script>
</body>
</html>