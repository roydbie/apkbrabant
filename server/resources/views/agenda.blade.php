@extends('layouts.app')

@section('content')

<style>
    .head {
        font-weight:bold;
        padding-top:10px;
        padding-bottom:10px;
    }

    .agenda {
        width:100%;
        margin:auto;
    }

    .agenda > .row > .col {
        min-height:40px!important;
        border: 1px solid #e0e0e0;
        margin: 10px 20px;
        border-radius: 5px;
    }

    .agenda > .col > .btn {
        width: 80%!important;
    }

    #containment-wrapper {
        width: 93.5%;
        margin-left:50px;
        height:600px;
        margin-bottom:50px;
        padding: 10px;
        text-align: center;
        background-color:white;
        border-radius: 10px;
        box-shadow: 0px 5px 10px #dedede;
    }
</style>

<div id="containment-wrapper">
    <div class="agenda" style="max-height:100%!important;overflow-y:scroll;overflow-x:hidden;">
        <div class="row">
            <div class="col">

            </div>
            <div class="col head">
                Maandag <br> 27 September
            </div>
            <div class="col head">
                Dinsdag <br> 28 September
            </div>
            <div class="col head">
                Woensdag <br> 29 September
            </div>
            <div class="col head">
                Donderdag <br> 30 September
            </div>
            <div class="col head">
                Vrijdag <br> 1 oktober
            </div>
            <div class="col head">
                Zaterdag <br> 2 oktober
            </div>
        </div>
        <div class="row">
            <div class="col head">
                08:00
            </div>
            <div class="col">

            </div>
            <div class="col">
                <button class="btn btn-secondary btn-sm mt-2" style="width:80%!important;margin-left:10%;">ZJ-RB-32<br>08:30</button>
                <button class="btn btn-success btn-sm my-2" style="width:80%!important;margin-left:10%;">26-XL-JH<br>08:45</button>

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                09:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                10:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                11:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                12:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                13:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                14:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                15:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                16:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                17:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col head">
                18:00
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>

@stop
