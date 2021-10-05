<?php

$route = $_GET['route'];

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x:hidden;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APK Brabant - <?php echo ucfirst($route) ?></title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>

        </script>

        <!-- Styles -->
        <style>
            body {
                font-size: 0.75rem;
            }
            #containment-wrapper {
                width: 95%;
                margin-left:2.5%;
                height:600px;
                margin-bottom:50px;
                border:1px solid #cccccc;
                padding: 10px;
                text-align: center;
            }

            .draggable {
                width: 150px;
                height: 150px;
                padding: 0.5em;
                cursor: move;
                border: 1px solid #cccccc;
                /* background-image: url("/img/car.png");*/
                /* background-position: center; /* Center the image */
                /* background-repeat: no-repeat; /* Do not repeat the image */
                /* background-size: cover; /* Resize the background image to cover the entire container */
            }

            .topbar {
                height:40px;
                width:100vw;
                background-color: #e8e8e8;
                vertical-align: middle;
                box-shadow: 0px 0px 10px #474747;
            }

            .menu-item {
                display: inline-block;
                margin-left:10px;
                margin-top: 5px;
                margin-right:10px;
                color: #4e4a5c;
            }

            .newbtn {
                font-size:0.75rem;
            }

            .newbtn:hover {
                text-decoration: underline;
            }

            .menubar {
                height:80px;
                width:100vw;
                border-bottom: 1px solid #cccccc;
            }

            .menuicon {
                width:25px;
                margin-top: 12px;
                height: auto;
            }

            .menu-item-2 {
                display: inline-block;
                margin-left:8px;
                margin-top: 6px;
                margin-right:8px;
                cursor:pointer;
                color: black;
                font-weight: bold;
                text-align: center!important;
            }

            .brand {
                width:60px;
                margin-top: 12px;
                height: auto;
                color: yellow!important;
            }

        </style>
    </head>
    <body class="mx-auto" onload="onLoad()">
        <div class="menubar mb-3">
            <div class="row">
                <div class="col" style="margin-left:50px;">
                    <div class="menu-item-2" onclick="location.href='/?route=overzicht';">
                        <img src="/img/map.svg" class="menuicon mb-2" alt="notfound"><br>Overzicht
                    </div>
                    <div class="menu-item-2" onclick="location.href='/?route=agenda';">
                        <img src="/img/calendar-week.svg" class="menuicon mb-2" alt="notfound"><br>Agenda
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/calendar-check-fill.svg" class="menuicon mb-2" alt="notfound"><br>APK-keuring
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/box.svg" class="menuicon mb-2" alt="notfound"><br>Magazijn
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/bar-chart-line.svg" class="menuicon mb-2" alt="notfound"><br>Dashboard
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/search.svg" class="menuicon mb-2" alt="notfound"><br>Zoeken
                    </div>
                </div>
                <div class="col" style="margin-right:50px;text-align:right;">
                    <div class="menu-item-2" onclick="history.go(-1);">
                        <img src="/img/backspace.svg" class="menuicon mb-2" alt="notfound"><br>Stap terug
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/house-door.svg" class="menuicon mb-2" alt="notfound"><br>Home
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/person-circle.svg" class="menuicon mb-2" alt="notfound"><br>Account
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/box-arrow-right.svg" class="menuicon mb-2" alt="notfound"><br>Uitloggen
                    </div>
                </div>
            </div>
        </div>

        <?php

        print "<h1 class=\"text-center my-3\">" . ucfirst($route) . "</h1>";

        require __DIR__. '/' . $route . '.php';

        ?>


    </body>
</html>
