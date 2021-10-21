<?php
use Illuminate\Support\Facades\DB;
$results = DB::select("SELECT * FROM planning WHERE status = 'pending'");
$arrayPending = [];
for ($i = 0; $i < count($results); $i++) {
    array_push($arrayPending, $results[$i]->kenteken);
}
$filteredarrayPending = array_unique($arrayPending);
foreach ($filteredarrayPending as $key => $value){
    //echo $value;
}

?>

@extends('layouts.app')

@section('content')

<style>
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

    .draggable {
        width: 150px;
        height: 150px;
        padding: 0.5em;
        cursor: move;
        border:none;
        background-color: #f5f5f5!important;
        border-radius: 10px;
    }

    .brand {
        width:60px;
        margin-top: 12px;
        height: auto;
        color: yellow!important;
    }
</style>

<div id="containment-wrapper">
    <?php
        for ($i = 0; $i < count($filteredarrayPending); $i++) {
            $merk = DB::select("SELECT merk FROM autos WHERE kenteken = '$filteredarrayPending[$i]'");
            $merklogo = $merk[0]->merk;
            print "<div id=\"car$i\" class=\"draggable ui-widget-content\">";
            print "<img src=\"/img/brands/$merklogo.png\" class=\"brand\" alt=\"notfound\"><br>";
            print "<button class=\"btn btn-success my-4 btn-sm\" onclick=\"window.location.href='/kentekensearch/kenteken=$filteredarrayPending[$i]'\">$filteredarrayPending[$i]</button>";
            print "</div>";
        }
    ?>
</div>

<script>
    function onLoad() {
        $("#car0").offset({top: localStorage.getItem("car0positieY"), left: localStorage.getItem("car0positieX")});
        $("#car1").offset({top: localStorage.getItem("car1positieY"), left: localStorage.getItem("car1positieX")});
        $("#car2").offset({top: localStorage.getItem("car2positieY"), left: localStorage.getItem("car2positieX")});
        $("#car3").offset({top: localStorage.getItem("car3positieY"), left: localStorage.getItem("car3positieX")});
        $("#car4").offset({top: localStorage.getItem("car4positieY"), left: localStorage.getItem("car4positieX")});
    }

    $( function() {
        $( "#car0" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car1" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car2" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car3" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car4" ).draggable({ containment: "#containment-wrapper", scroll: false });
    } );

    $('#car0').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car0positieX", xPos);
                localStorage.setItem("car0positieY", yPos);
            }
        });

    $('#car1').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car1positieX", xPos);
                localStorage.setItem("car1positieY", yPos);
            }
        });

    $('#car2').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car2positieX", xPos);
                localStorage.setItem("car2positieY", yPos);
            }
        });

    $('#car3').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car3positieX", xPos);
                localStorage.setItem("car3positieY", yPos);
            }
        });

    $('#car4').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car4positieX", xPos);
                localStorage.setItem("car4positieY", yPos);
            }
        });
</script>

@stop
