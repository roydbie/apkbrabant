<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x:hidden;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APK Brabant - Overzicht</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-size: 0.75rem;
                background-color: #EEF3F6;
                font-family: 'Rubik', sans-serif;
            }
        </style>
    </head>
    <body class="mx-auto" onload="onLoad()">

    <?php
    require __DIR__. '/menubar.php';
    ?>

    <br><br>

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


    </body>
</html>
