@extends('layouts.master')

@section('content')

    <h4>Region {{$region}}</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Item</th>
                <th>Jatah Awal</th>
                <th>Jatah Sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
            <tr>
                <td>{{$r->id}}</td>
                <td>{{$r->id_item}}</td>
                <td>{{$r->jatah_awal}}</td>
                <td>{{$r->jatah_sisa}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection