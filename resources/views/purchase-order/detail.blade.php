@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i><span> Back</span></button>        
            <br><br>
            <table class="table table-bordered">
                <tr>
                    <th>Region SBU</th>
                    <td>{{$detail_po->nama_sbu}}</td>
                </tr>
                <tr>
                    <th>Nomor PO</th>
                    <td>{{$detail_po->po_number}}</td>
                </tr>
                <tr>
                    <th>Project Name</th>
                    <td>{{$detail_po->project_name}}</td>
                </tr>
                <tr>
                    <th>No Reservasi</th>
                    <td>{{$detail_po->no_reservasi}}</td>
                </tr>
                <tr>
                    <th>Purchase Order Date</th>
                    <td>{{$detail_po->po_date}}</td>
                </tr>
            </table>
            <h3>Purchase Order Item</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Item Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $i)
                    <tr>
                        <th>{{$i['no']}}</th>
                        <td>{{$i['item_name']}}</td>
                        <td>{{$i['quantity']}}</td>
                        <td>{{number_format($i['price']).""}}</td>
                        <td>{{number_format($i['total_price']).""}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan=4>Total Price</th>
                        <th>{{number_format($total).""}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
    </div>
@endsection