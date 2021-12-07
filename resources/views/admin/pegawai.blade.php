@extends('pegawai.layout')

@section('title')
    <title>Pegawai</title>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                                            <td id="active-{{$pegawai->id}}">Active</td>
                                        @else
                                            <td id="active-{{$pegawai->id}}">Suspend</td>
                                        @endif
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reset-pass" onclick="getId({{$pegawai->id}})" href="#">Reset Password</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='notifActv({{$pegawai->id}})' href="#">Activation</a></li>
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
                        <input type="email" class='form-control' name='email' pleaceholder="Masukan email pegawai" require>
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
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save</button>
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
      <div class="modal-footer" id="mdl-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-bs-dismiss="modal" onclick='resetPass()'>Submit</button>
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('ajaxquery')
<script>
    $(document).ready(function(){
        $('.nav-item').removeClass('active');
        $('#pegawai').addClass('active');
    });

    function notifActv(id){
        $('#mdl-body').html('Apakah yakin mengubah activasi pegawai ini?');
        $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-bs-dismiss="modal" onclick='suspend(`+id+`)'>Yes</button>`);
    }

    function suspend(id){
        $.ajax({
            type:'POST',
            url:'{{route("pegawai.suspend")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#mdl-body').html('');
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> ');
                if(data.status=='ok'){
                    $('#mdl-body').html('Aktivasi Pegawai berhasil diubah');
                    $('#active-'+id).html(data.act);
                }
                else{
                    $('#mdl-body').html('Perubahan gagal, silahkan dicoba kembali');
                }
                $('#modalInfo').modal('show');
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
                $('#mdl-body').html('');
                $('#mdl-body').html(data.msg);
                $('#modalInfo').modal('show');
            }
        });
    }
</script>
@endsection