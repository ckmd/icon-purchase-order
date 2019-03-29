@extends('layouts.master')

@section('footer')
<script>
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Halaman Stock</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus"></i> Tambah Stock
            </button>
            <button type="button" class="btn btn-success">
                <i class="fas fa-plus"></i> History Tambah Stock
            </button>
            <br><br>

            <form action="{{url('add-stock-reload')}}" method="post">
              {{csrf_field()}}
                <div class="form-group">
                    <label for="sbu">Select Region SBU (select one):</label>
                    <select name="nama_sbu" class="form-control" id="sbu" onchange='if(this.value != null) { this.form.submit(); }'>
                        <option value="null" selected>-- Pilih Region SBU --</option>
                    @foreach($sbus as $r)
                        <option value="{{$r->nama_sbu}}">{{$r->nama_sbu}}</option>
                    @endforeach
                    </select>
                </div>
            </form>
            @if($report!=null)
            <h4>Region {{$region}}</h4>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Item</th>
                        <th>Jatah_Awal</th>
                        <th>Jatah_Sisa</th>
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
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

@endsection

@include('add-stock.add')