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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($query as $pegawai)
                                    <tr>
                                        <td>{{$pegawai->name}}</td>
                                        <td>{{$pegawai->email}}</td>
                                        @if($pegawai->active == true)
                                            <td>active</td>
                                        @else
                                            <td>Suspend</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal add  -->
<!-- <div class="modal fade" id="createForm" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">DISCLAIMER</h4>
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
                        <input type="text" class='form-control' name='emailPegawai' pleaceholder="Masukan email pegawai" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Password Pegawai</label>
                        <input type="password" class='form-control' name='passPegawai' pleaceholder="Masukan password pegawai" require>
                    </div>
                    <div class='form-group'>
                        <label for="">Konfirmasi Password</label>
                        <input type="password" class='form-control' name='konfirmasiPass' pleaceholder="Masukan password pegawai kembali" require>
                    </div>
                    <button type='submit' class='btn btn-primary'>Submit</button>
               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" >Save change</button>
        </div>
            </form>
      </div>
   </div>
</div> -->

<!-- modal add -->
<!-- Modal -->
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

</body>
</html>