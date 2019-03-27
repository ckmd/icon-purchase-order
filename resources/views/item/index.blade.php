@extends('layouts.master')

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
                @foreach($items as $i)
                <tr>
                    <th>{{$i->id}}</th>
                    <td>{{$i->nama_item}}</td>
                    <td>Rp {{number_format($i->unit_price).""}}</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

@include('item.add')