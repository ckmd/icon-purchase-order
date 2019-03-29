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
            <br><br>

            <table class="table table-bordered">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@include('add-stock.add')