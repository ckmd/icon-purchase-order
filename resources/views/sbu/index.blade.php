@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Halaman SBU</h4>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No. </th>
                    <th>Nama_SBU</th>
                    <th>Action</th>
                </tr>
                @foreach($sbus as $sbu)
                <tr>
                    <th>{{$sbu->id_sbu}}</th>
                    <td>{{$sbu->nama_sbu}}</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah SBU
            </button>
        </div>
    </div>
</div>

@endsection

@include('sbu.add')