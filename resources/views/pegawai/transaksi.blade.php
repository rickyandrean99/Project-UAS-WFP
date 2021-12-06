@extends('pegawai.layout')

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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Kategori</button>
            </div>
            <div class='card'>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Member</th>
                                <th>Tanggal</th>
                                <th>Status</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $transaksi)
                                <tr>
                                    <td >{{$transaksi->id}}</td>
                                    <td>{{$transaksi->user->nama}}</td>
                                    <td><?php date('Y-m-d', strtotime($transaksi->tanggal)) ?></td>
                                    <td>
                                        @if($transaksi->status == true)
                                            <button class='btn btn-secondary'>Sudah dikonfirmasi</button>
                                        @else
                                            <button class='btn btn-primari'>Konfirmasi</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $transaksi->links() }}
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('kategori.store')}}" method='post' enctype="multipart/form-data">
                   @csrf
                    <div class='form-group'>
                        <label for="">Nama kategori</label>
                        <input type="text" class='form-control' name='nmKategori' pleaceholder="Masukan nama kategori" require>
                    </div>
                    <div>
                        <label for="">Foto kategori</label>
                        <input type="file" accept="image/*" name='ftKategori' class="form-control" id="add-img" onChange="addImg(event)" >
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
        $('#transaksi').addClass('active');
    });
</script>
@endsection