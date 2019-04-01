@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Welcome {{ Auth::user()->name }} !</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{asset('img/icon.png')}}" alt="AdminLTE Logo" style="opacity: 0.8" width="20%" height="20%">

                    You are logged in ICON+ Purchase Order 3PL !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
