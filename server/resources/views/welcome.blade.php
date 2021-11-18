<?php
use Illuminate\Support\Facades\DB;
$results = DB::select("SELECT * FROM planning WHERE status = 'in afwachting' OR status = 'gerepareerd'");
$arrayPending = [];
for ($i = 0; $i < count($results); $i++) {
    array_push($arrayPending, array("kenteken" => $results[$i]->kenteken, "status" => $results[$i]->status));
}
$filteredarrayPending = unique_multidim_array($arrayPending,'kenteken');

function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}


?>

@extends('layouts.app')

@section('huidigepagina')
    <h6 style="margin-left:2.5%;margin-top:10px;margin-bottom: 0px!important;">Overzicht</h6>
@stop

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
    $number = 0;
    foreach ($filteredarrayPending as $key => $value) {
            $kenteken = $value["kenteken"];

            $merk = DB::select("SELECT merk FROM autos WHERE kenteken = '$kenteken'");

            print "<div id=\"car$number\" class=\"draggable ui-widget-content\">";
            if($merk){
                $merklogo = $merk[0]->merk;
                print "<img src=\"/img/brands/$merklogo.png\" class=\"brand\" alt=\"notfound\"><br>";
            } else {
                print "<p style=\"font-size:30px;margin-top:25px;margin-bottom:0;\">&#10060;</p>";
            }
            if($value["status"] == 'in afwachting'){
                print "<button class=\"btn btn-danger my-4 btn-sm\" onclick=\"window.location.href='/kentekensearch/kenteken=$kenteken'\">$kenteken</button>";
            } elseif($value["status"] == 'gerepareerd') {
                print "<button class=\"btn btn-success my-4 btn-sm\" onclick=\"window.location.href='/kentekensearch/kenteken=$kenteken'\">$kenteken</button>";
            }

            print "</div>";
            $number = $number + 1;
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
        $("#car5").offset({top: localStorage.getItem("car5positieY"), left: localStorage.getItem("car5positieX")});
    }

    $( function() {
        $( "#car0" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car1" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car2" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car3" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car4" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car5" ).draggable({ containment: "#containment-wrapper", scroll: false });
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

    $('#car5').draggable(
        {
            drag: function(){
                var offset = $(this).offset();
                var xPos = offset.left;
                var yPos = offset.top;
                localStorage.setItem("car5positieX", xPos);
                localStorage.setItem("car5positieY", yPos);
            }
        });
</script>

@stop
