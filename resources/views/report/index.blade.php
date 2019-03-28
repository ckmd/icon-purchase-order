@extends('layouts.master')

@section('footer')
<script>
    $('#edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var jatah = button.data('jatahawal');
        var item = button.data('namaitem');
        var sbu = button.data('namasbu');
        var id = button.data('reportid');

        var modal = $(this);
        modal.find('.modal-body #reportid').val(id);
        modal.find('.modal-body #namasbu').val(sbu);
        modal.find('.modal-body #namaitem').val(item);
        modal.find('.modal-body #jatahawal').val(jatah);
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Halaman Report</h4>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah Report
            </button>
            <br><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama_SBU</th>
                        <th>Nama_Item</th>
                        <th>Jatah_Awal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $r)
                    <tr>
                        <td>{{$r->id}}</td>
                        <td>{{$r->nama_sbu}}</td>
                        <td>{{$r->id_item}}</td>
                        <td>{{$r->jatah_awal}}</td>
                        <td>
                            <button class="btn btn-warning" data-reportid="{{$r->id}}" data-namasbu="{{$r->nama_sbu}}" data-namaitem="{{$r->id_item}}" data-jatahawal="{{$r->jatah_awal}}" data-toggle="modal" data-target="#edit">Edit</button>
                            <!-- <button class="btn btn-danger">Hapus</button> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@include('report.add')
@include('report.edit')
