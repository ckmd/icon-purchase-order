@extends('layouts.master')

@section('footer')
<script>
    $('#edit').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('itemid');
        var harga = button.data('unitprice');
        var item = button.data('namaitem');

        var modal = $(this);
        modal.find('.modal-body #itemid').val(id);
        modal.find('.modal-body #namaitem').val(item);
        modal.find('.modal-body #unitprice').val(harga);
    });

    $('#delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('itemid');

        var modal = $(this);
        modal.find('.modal-body #itemid').val(id);
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Halaman Item</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah Item Baru
            </button> <br> <br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No. </th>
                    <th>Nama_Item</th>
                    <th>Unit_Price</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;?>
                @foreach($items as $i)
                <tr>
                    <th>{{$no}}</th>
                    <td>{{$i->nama_item}}</td>
                    <td>Rp {{number_format($i->unit_price).""}}</td>
                    <td>
                        <button class="btn btn-warning" data-itemid="{{$i->id}}" data-namaitem="{{$i->nama_item}}" data-unitprice="{{$i->unit_price}}" data-toggle="modal" data-target="#edit">Edit</button>
                        <button class="btn btn-danger" data-itemid="{{$i->id}}" data-toggle="modal" data-target="#delete">Hapus</button>
                    </td>
                </tr>
                <?php $no++;?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

@include('item.add')
@include('item.edit')
@include('item.delete')