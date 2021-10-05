<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x:hidden;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APK Brabant - Home</title>

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
                margin-left:calc((100% - 25px)/2);
                margin-top: 12px;
                height: auto;
                color: yellow!important;
            }

            .menu-item-2 {
                display: inline-block;
                margin-left:5px;
                margin-top: 6px;
                margin-right:5px;
            }
            .menu-item-2  a{
                color: #025beb;
                font-weight: bold;
            }

        </style>
    </head>
    <body class="mx-auto" onload="onLoad()">

        <div class="topbar">
            <div class="row">
                <div class="col" style="text-align:left!important;margin-left:50px;">
                    <div class="menu-item">
                        <a href="" class="btn newbtn">Uitloggen</a>
                    </div>
                    <div class="menu-item">
                        <a href="" class="btn newbtn">Home</a>
                    </div>
                    <div class="menu-item">
                        <a href="" class="btn newbtn">Welkom Roy de Bie</a>
                    </div>
                    <div class="menu-item">
                        <a class="btn newbtn">
                            <?php
                            date_default_timezone_set("Europe/Amsterdam");
                            echo date("l") . " " . date("d-m") . " " . date("h:i")
                            ?>
                        </a>
                    </div>
                </div>
                <div class="col" style="text-align:right!important;margin-right:50px;">
                    <div class="menu-item">
                        <button onclick="history.go(-1);" class="btn newbtn">Terug</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="menubar mb-3">
            <div class="row">
                <div class="col" style="text-align:left!important;margin-left:50px;">
                    <div class="menu-item-2">
                        <img src="/img/map.svg" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">Overzicht</a>
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/calendar-week.svg" style="color:red!important;" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">Agenda</a>
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/calendar-check-fill.svg" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">APK-keuring</a>
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/box.svg" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">Magazijn</a>
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/bar-chart-line.svg" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">Dashboard</a>
                    </div>
                    <div class="menu-item-2">
                        <img src="/img/search.svg" class="menuicon" alt="notfound"><br>
                        <a href="" class="btn newbtn">Zoeken</a>
                    </div>
                </div>
                <div class="col-1" style="text-align:right!important;margin-right:50px;">

                </div>
            </div>
        </div>

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

    </body>
</html>
