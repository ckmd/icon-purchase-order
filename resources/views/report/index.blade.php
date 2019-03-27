@extends('layouts.master')

@section('footer')
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
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
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
