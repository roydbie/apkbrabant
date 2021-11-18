@extends('layouts.app')

@section('huidigepagina')
    <h6 style="margin-left:2.5%;margin-top:10px;margin-bottom: 0px!important;">Kenteken profiel > Auto informatie</h6>
@stop

    @section('content')
        <style>
            #containment-wrapper {
                width: 95%;
                margin-left:2.5%;
                min-height:34vw;
                margin-bottom:50px;
                padding: 10px;
                text-align: center;
                background-color:white;
                border-radius: 10px;
                box-shadow: 0px 5px 10px #dedede;
            }

            .form-nieuw-werkorder {
                width:30%;
                margin-left:35%;
                text-align:left;
            }

            .form-control {
                font-size:0.80rem;
            }
        </style>

        <div id="containment-wrapper">
            <h1 style="margin-top:20px;">Nieuwe informatie <?php print strtoupper($_GET["kenteken"])?></h1>

            <div class="form-nieuw-werkorder">
                <div class="form-group">
                    <label for="inputMerk">Merk</label>
                    <select class="form-select" id="inputMerk" name="merk" style="width:300px;font-size:0.8rem;">
                        <option value=""></option>
                        <option value="BMW">BMW</option>
                        <option value="LandRover">Land Rover</option>
                        <option value="Mercedes">Mercedes</option>
                        <option value="Mini">Mini</option>
                        <option value="Peugeot">Peugeot</option>
                        <option value="Volvo">Volvo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputType">Type</label>
                    <input type="text" class="form-control" id="inputType" name="type" style="width:300px;">
                </div>
                <div class="form-group">
                    <label for="inputMeldcode">Meldcode</label>
                    <input type="text" class="form-control" id="inputMeldcode" name="meldcode" maxlength="4" style="width:75px;">
                </div>

                <br>
                <button
                    type="submit"
                    name="submit"
                    class="btn btn-success"
                    style="font-size:0.80rem;"
                    onclick="Redirect();"
                >Informatie toevoegen</button>
            </div>

            <?php
            $kenteken = $_GET["kenteken"];
            ?>

            <script>
                function Redirect() {
                    <?php
                    echo "var kenteken ='$kenteken';";
                    ?>
                    var merk = document.getElementById('inputMerk').value;
                    var type = document.getElementById('inputType').value;
                    var meldcode = document.getElementById('inputMeldcode').value;
                    location.href = `/nieuw_auto/kenteken=${kenteken}/merk=${merk}/type=${type}/meldcode=${meldcode}`;
                }
            </script>

        </div>



    @stop
