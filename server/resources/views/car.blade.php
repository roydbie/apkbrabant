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

    <?php require __DIR__. '/menubar.php'; ?>

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
