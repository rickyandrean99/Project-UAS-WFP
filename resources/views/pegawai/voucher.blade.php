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
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Voucher</div>
        <div class="row">
            <div class="col-md-10">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Voucher</button>
            </div>
            <div class='card'>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Discount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $voucher)
                                <tr id='tr-{{$voucher->id}}'>
                                    <td >{{ $voucher->id }}</td>
                                    <td>{{ $voucher->kode }}</td>
                                    <td>{{ $voucher->discount }}%</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="getData({{$voucher->id}})" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo" onclick='deletes({{$voucher->id}})' href="#">Delete</a></li>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Voucher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('voucher.store')}}" method='post' enctype="multipart/form-data">
                   @csrf
                    <div class='form-group'>
                        <label for="">Kode Voucher</label>
                        <input type="text" class='form-control' name='kdVoucher' pleaceholder="Masukan kode voucher" require>
                    </div>
                    <div>
                        <label for="">Diskon</label>
                        <input type="number" name='discVoucher' class="form-control" min=0 max=100 require>
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
        $('#voucher').addClass('active');
    });

    function getData(id){
        $.ajax({
            type:'POST',
            url:'{{route("voucher.data")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#mdl-header').html('Update voucher');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('');
                // $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                // <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modalInfo" data-bs-dismiss="modal" onclick='update()'>Submit</button>`);
            }
            }); 
    }
    function deletes(id){
            $('#mdl-header').html('Pemberitahuan');
            $('#mdl-body').html('Apakah yakin menghapus voucher ini?');
            $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-default"  data-bs-dismiss="modal" onclick='dltVoucher(`+id+`)'>Yes</button>`);
        }

    function dltVoucher(id){
        $.ajax({
            type:'POST',
            url:'{{route("voucher.dltVoucher")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#mdl-body').html('');
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> ');
                if(data.status=='ok'){
                    $('#mdl-body').html('Voucher berhasil dihapus');
                    $('#tr-'+id).remove();
                    
                }
                else{
                    $('#mdl-body').html('Voucher gagal dihapus, silahkan dicoba kembali');
                }
                $('#modalInfo').modal('show');
            }
        }); 
    }
</script>
@endsection