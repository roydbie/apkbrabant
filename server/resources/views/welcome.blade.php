<?php
use Illuminate\Support\Facades\DB;
$results = DB::select("SELECT * FROM planning WHERE status = 'in afwachting' OR status = 'gerepareerd'");
$arrayPending = [];
for ($i = 0; $i < count($results); $i++) {
    array_push($arrayPending, (object) ['kenteken' => $results[$i]->kenteken, 'status' => $results[$i]->status]);
}
$filteredarrayPending = [];
for ($i = 0; $i < count($arrayPending); $i++) {
    if(count($filteredarrayPending)){
        if ($arrayPending[$i]->kenteken == end($filteredarrayPending)->kenteken){
            //
        } else {
            array_push($filteredarrayPending, $arrayPending[$i]);
        }
    } else {
        array_push($filteredarrayPending, $arrayPending[$i]);
    }
}

?>

@extends('layouts.app')

@section('content')

<style>
    #containment-wrapper {
        width: 95%;
        margin-left:2.5%;
        height:34vw;
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
            $kenteken = $filteredarrayPending[$i]->kenteken;
            $merk = DB::select("SELECT merk FROM autos WHERE kenteken = '$kenteken'");

            print "<div id=\"car$i\" class=\"draggable ui-widget-content\">";
            if($merk){
                $merklogo = $merk[0]->merk;
                print "<img src=\"/img/brands/$merklogo.png\" class=\"brand\" alt=\"notfound\"><br>";
            } else {
                print "<p style=\"font-size:30px;margin-top:25px;margin-bottom:0;\">&#10060;</p>";
            }
            if($filteredarrayPending[$i]->status == 'in afwachting'){
                print "<button class=\"btn btn-danger my-4 btn-sm\" onclick=\"window.location.href='/kentekensearch/kenteken=$kenteken'\">$kenteken</button>";
            } elseif($filteredarrayPending[$i]->status == 'gerepareerd') {
                print "<button class=\"btn btn-success my-4 btn-sm\" onclick=\"window.location.href='/kentekensearch/kenteken=$kenteken'\">$kenteken</button>";
            }

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
