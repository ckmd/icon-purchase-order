@extends('layouts.master')

@section('footer')

<script>
    $(".detail-po").click(function() {
        window.location = $(this).data("pohref");
    });

    $('#delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var id = button.data('poid');

        var modal = $(this);
        modal.find('.modal-body #poid').val(id);
    });
</script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Halaman Purchase Order</h3>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah Purchase Order
            </button>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No. </th>
                    <th>Region_SBU</th>
                    <th>PO_Number</th>
                    <th>Project_Name</th>
                    <th>No_Reservasi</th>
                    <th>Purchase_Order_Date</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1; ?>
                @foreach($pos as $p)
                <tr>
                    <th>{{$no}}</th>
                    <td>{{$p->nama_sbu}}</td>
                    <td>{{$p->po_number}}</td>
                    <td>{{$p->project_name}}</td>
                    <td>{{$p->no_reservasi}}</td>
                    <td>{{$p->po_date}}</td>
                    <td>
                        <button class='btn btn-success detail-po' data-pohref="purchase-order-detail/{{$p->po_number}}">Detail</button>
                        <button data-poid="{{$p->id}}" class="btn btn-danger" data-toggle="modal" data-target="#delete">Hapus</button>
                        <!-- <button class="btn btn-warning">Edit</button> -->
                    </td>
                </tr>
                <?php $no++;?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

@include('purchase-order.add')
@include('purchase-order.delete')