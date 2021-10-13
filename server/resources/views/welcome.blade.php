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
        /* background-image: url("/img/car.png");*/
        /* background-position: center; /* Center the image */
        /* background-repeat: no-repeat; /* Do not repeat the image */
        /* background-size: cover; /* Resize the background image to cover the entire container */
    }

    .brand {
        width:60px;
        margin-top: 12px;
        height: auto;
        color: yellow!important;
    }
</style>

<div id="containment-wrapper">
    <div id="car1" class="draggable ui-widget-content">
        <img src="/img/brands/bmw.png" class="brand" alt="notfound"><br>
        <button class="btn btn-warning my-4 btn-sm" onclick="window.location.href='/car/ZJ-RB-32'">ZJ-RB-32</button>
    </div>
    <div id="car2" class="draggable ui-widget-content">
        <img src="/img/brands/volvo.png" class="brand" alt="notfound"><br>
        <button class="btn btn-success my-4 btn-sm" onclick="window.location.href='/car/26-XL-JH'">26-XL-JH</button>
    </div>
    <div id="car3" class="draggable ui-widget-content">
        <img src="/img/brands/mercedes.png" class="brand" alt="notfound"><br>
        <button class="btn btn-warning my-4 btn-sm" onclick="window.location.href='/car/21-VRG-3'">21-VRG-3</button>
    </div>
    <div id="car4" class="draggable ui-widget-content">
        <img src="/img/brands/peugeot.png" class="brand" alt="notfound"><br>
        <button class="btn btn-danger my-4 btn-sm" onclick="window.location.href='/car/SP-GH-03'">SP-GH-03</button>
    </div>
</div>

<script>
    function onLoad() {
        $("#car1").offset({top: localStorage.getItem("car1positieY"), left: localStorage.getItem("car1positieX")});
        $("#car2").offset({top: localStorage.getItem("car2positieY"), left: localStorage.getItem("car2positieX")});
        $("#car3").offset({top: localStorage.getItem("car3positieY"), left: localStorage.getItem("car3positieX")});
        $("#car4").offset({top: localStorage.getItem("car4positieY"), left: localStorage.getItem("car4positieX")});
    }

    $( function() {
        $( "#car1" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car2" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car3" ).draggable({ containment: "#containment-wrapper", scroll: false });
        $( "#car4" ).draggable({ containment: "#containment-wrapper", scroll: false });
    } );

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
