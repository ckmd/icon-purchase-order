@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="" method="post">

            @for($i = 1; $i <= 21; $i++)
                <h4>Item {{$i}} : Price</h4>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity">
                </div>
            @endfor
            
            <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection