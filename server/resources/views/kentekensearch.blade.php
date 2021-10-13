@extends('layouts.app')

@section('content')

@foreach ($werkorders as $werkorder)
    <h1 style="margin-left:50px;margin-top:20px;">{{$werkorder->werkzaamheden}}</h1>
@endforeach

@stop
