<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="overflow-x:hidden;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>APK Brabant - Agenda</title>

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
    <body class="mx-auto">

    <?php
    require __DIR__. '/menubar.php';

    ?>
    <br><br>
    <style>
        .head {
            font-weight:bold;
            padding-top:10px;
            padding-bottom:10px;
        }

        .agenda {
            width:80%;
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
    </style>

    <div class="agenda">
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



    </body>
</html>
