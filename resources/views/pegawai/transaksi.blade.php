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
        <div class="h2 poppins-normal text-center custom-text-color font-weight-bold mb-5">Transaksi</div>
        <div class="row">
            <div class='card'>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Member</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                                <th>Status</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $transaksi)
                                <tr>
                                    <td >{{$transaksi->id}}</td>
                                    <td>{{$transaksi->user->name}}</td>
                                    <td><?php echo date('d-m-Y', strtotime($transaksi->tanggal)) ?></td>
                                    <td><button class='btn btn-seccondary' onclick='detail({{$transaksi->id}})' data-bs-toggle="modal" data-bs-target="#modalInfo">Detail</button></td>
                                    <td id='td-confirm-{{$transaksi->id}}'>
                                        @if($transaksi->status == true)
                                            <button class='btn btn-success' disabled>Sudah dikonfirmasi</button>
                                        @else
                                            <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#modalInfo" onclick="confirmAlert({{$transaksi->id}})">Konfirmasi</button>
                                        @endif
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
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
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

    function confirmAlert(id){
        $('#modal-dialog').removeClass('modal-lg');
        $('#mdl-header').html('Pemberitahuan');
        $('#mdl-body').html('Yakin untuk menkonfirmasi transaksi ini?');
        $('#mdl-footer').html(`<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-default"  onclick="confirm(`+id+`)">Yes</button>`)
    }
    function confirm(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaksi.confirm")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#modal-dialog').removeClass('modal-lg');
                $('#mdl-header').html('Pemberitahuan');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>');
                $('#modalInfo').modal('show');
                if(data.status == 'ok'){
                    $('#td-confirm-'+ id).html("<button class='btn btn-success' disabled>Sudah dikonfirmasi</button>")
                }
            }
            }); 
    }
    function detail(id){
        $.ajax({
            type:'POST',
            url:'{{route("transaksi.details")}}',
            data:{
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success:function(data){
                $('#modal-dialog').addClass('modal-lg');
                $('#mdl-header').html('Detail Transaksi');
                $('#mdl-body').html(data.msg);
                $('#mdl-footer').html('<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>');
            }
        }); 
    }
</script>
@endsection