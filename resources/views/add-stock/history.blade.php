@extends('layouts.master')

@section('footer')
<script>
    $(".detail-history").click(function() {
        window.location = $(this).data("historyhref");
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i><span> Back</span></button>        
            <br><br>
            <h3>Halaman History Add Stock</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama SBU</th>
                        <th>Add Stock Number</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach($addStocks as $as)
                    <tr>
                        <th>{{$i}}</th>
                        <td>{{$as->nama_sbu}}</td>
                        <td>{{$as->as_number}}</td>
                        <td>{{$as->description}}</td>
                        <td>{{$as->as_date}}</td>
                        <td>
                            <button class='btn btn-success detail-history' data-historyhref="history-add-stock-detail/{{$as->as_number}}">Detail</button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection