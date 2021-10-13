@extends('layouts.app')

@section('content')

<h1 class="text-center my-3">Overzicht</h1>
<h2 class="text-center">{{$id}}</h2>

<table class="table table-hover" style="width:80%;margin-left:10%;margin-top:5%;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Omschrijving</th>
        <th scope="col">Datum</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>APK keuring</td>
        <td>23-08-2021</td>
        <td><button class="btn btn-success btn-sm">Details</button></td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>APK keruing</td>
        <td>18-06-2020</td>
        <td><button class="btn btn-success btn-sm">Details</button></td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>APK keuring</td>
        <td>21-06-2019</td>
        <td><button class="btn btn-success btn-sm">Details</button></td>
    </tr>
    </tbody>
</table>

@stop
