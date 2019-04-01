@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i><span> Back</span></button>        
            <br><br>
            <h3>Detail History Add Stock</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Region SBU</th>
                    <td>{{$detail_as->nama_sbu}}</td>
                </tr>
                <tr>
                    <th>Nomor Add Stock</th>
                    <td>{{$detail_as->as_number}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$detail_as->description}}</td>
                </tr>
                <tr>
                    <th>Add Stock Date</th>
                    <td>{{$detail_as->as_date}}</td>
                </tr>
            </table>
            <h3>Add Stock Item</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Item</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $d)
                    <tr>
                        <th>{{$d['no']}}</th>
                        <td>{{$d['item_name']}}</td>
                        <td>{{$d['quantity']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
    </div>
@endsection