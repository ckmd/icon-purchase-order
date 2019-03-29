@extends('layouts.master')

@section('footer')
<script>
    $('#edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('sbuid');
        var sbu = button.data('namasbu');

        var modal = $(this);
        modal.find('.modal-body #sbuid').val(id);
        modal.find('.modal-body #namasbu').val(sbu);
    });

    $('#delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('sbuid');

        var modal = $(this);
        modal.find('.modal-body #sbuid').val(id);
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Halaman SBU</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah SBU
            </button> <br> <br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No. </th>
                    <th>Nama_SBU</th>
                    <th>Action</th>
                </tr>
                <?php $no=1; ?>
                @foreach($sbus as $sbu)
                <tr>
                    <th>{{$no}}</th>
                    <td>{{$sbu->nama_sbu}}</td>
                    <td>
                        <button class="btn btn-warning" data-sbuid="{{$sbu->id}}" data-namasbu="{{$sbu->nama_sbu}}" data-toggle="modal" data-target="#edit">Edit</button>
                        <button class="btn btn-danger" data-sbuid="{{$sbu->id}}" data-toggle="modal" data-target="#delete">Edit</button>
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

@include('sbu.add')
@include('sbu.edit')
@include('sbu.delete')