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
            <h1 style="margin-top:20px;">Nieuw werkorder <?php print strtoupper($_GET["kenteken"])?></h1>

            <div class="form-nieuw-werkorder">
                <div class="form-group">
                    <label for="inputWerkzaamheden">Werkzaamheden</label>
                    <input type="text" class="form-control" id="inputWerkzaamheden" name="werkzaamheden">
                </div>
                <div class="form-group">
                    <label for="inputDatum">Datum</label>
                    <input type="date" class="form-control" id="inputDatum" name="datum" style="width:160px;">
                </div>
                <div class="form-group">
                    <label for="inputTijd">Tijd</label>
                    <input type="time" class="form-control" id="inputTijd" name="tijd" style="width:160px;">
                </div>
                <div class="form-group">
                    <label for="inputKosten">Kosten</label>
                    <input type="float" class="form-control" id="inputKosten" name="kosten" style="width:100px;">
                </div>
                <br>
                <button
                    type="submit"
                    name="submit"
                    class="btn btn-primary"
                    style="font-size:0.80rem;"
                    onclick="Redirect();"
                >Submit</button>
            </div>

            <?php
            $kenteken = $_GET["kenteken"]
            ?>

            <script>
                function Redirect() {
                    <?php
                    echo "var kenteken ='$kenteken';";
                    ?>
                    var werkzaamheden = document.getElementById('inputWerkzaamheden').value;
                    var datum = document.getElementById('inputDatum').value;
                    var tijd = document.getElementById('inputTijd').value;
                    var kosten = document.getElementById('inputKosten').value.replace(".", "-");

                    location.href = `/nieuw_werkorder/kenteken=${kenteken}/werkzaamheden=${werkzaamheden}/datum=${datum}/tijd=${tijd}/kosten=${kosten}`;
                }
            </script>

        </div>



    @stop