@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('dashboard.store')}}" method="post">
              {{csrf_field()}}
                <div class="form-group">
                    <label for="sbu">Select Region SBU (select one):</label>
                    <select name="nama_sbu" class="form-control" id="sbu">
                        <option value="null" selected>-- Pilih Region SBU --</option>
                    @foreach($sbus as $r)
                        <option value="{{$r->nama_sbu}}">{{$r->nama_sbu}}</option>
                    @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form> <br>
            @if($report!=null)
            <h4>Region {{$region}}</h4>
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr class="text-center">
                        <th rowspan=2>No.</th>
                        <th rowspan=2>Nama Item</th>
                        <th rowspan=2>Jatah_Awal</th>
                        <th rowspan=2>Jatah_Sisa</th>
                        <th colspan=12>Purchase Order Setiap Bulan</th>
                    </tr>
                    <tr>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Agt</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($report as $r)
                    <tr>
                        <th>{{$i}}</th>
                        <td nowrap="nowrap">{{$r['nama_item']}}</td>
                        <td>{{$r['jatah_awal']}}</td>
                        <td>{{$r['jatah_sisa']}}</td>
                        <td>{{$r['jan']}}</td>
                        <td>{{$r['feb']}}</td>
                        <td>{{$r['mar']}}</td>
                        <td>{{$r['apr']}}</td>
                        <td>{{$r['mei']}}</td>
                        <td>{{$r['jun']}}</td>
                        <td>{{$r['jul']}}</td>
                        <td>{{$r['agt']}}</td>
                        <td>{{$r['sep']}}</td>
                        <td>{{$r['okt']}}</td>
                        <td>{{$r['nov']}}</td>
                        <td>{{$r['des']}}</td>
                    </tr>
                    <?php $i++?>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection