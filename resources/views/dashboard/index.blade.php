@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Region {{$region}}</h4>
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Item</th>
                        <th>Jatah_Awal</th>
                        <th>Jatah_Sisa</th>
                        <th>Januari</th>
                        <th>Februari</th>
                        <th>Maret</th>
                        <th>April</th>
                        <th>Mei</th>
                        <th>Juni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($report as $r)
                    <tr>
                        <th>{{$i}}</th>
                        <td>{{$r['nama_item']}}</td>
                        <td>{{$r['jatah_awal']}}</td>
                        <td>{{$r['jatah_sisa']}}</td>
                        <td>{{$r['jan']}}</td>
                        <td>{{$r['feb']}}</td>
                        <td>{{$r['mar']}}</td>
                        <td>{{$r['apr']}}</td>
                        <td>{{$r['mei']}}</td>
                        <td>{{$r['jun']}}</td>
                    </tr>
                    <?php $i++?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection