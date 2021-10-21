    <?php
    use Illuminate\Support\Facades\DB;
    $results = DB::select('select omschrijving from artikelen');
    for ($i = 0; $i < count($results); $i++) {
        //echo $results[$i]->omschrijving;
    }

    date_default_timezone_set("Europe/Amsterdam");

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;

    $currenttime = date("H:i");

    ?>

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
                    <input type="text" class="form-control" id="inputWerkzaamheden" name="werkzaamheden" style="width:300px;">
                </div>
                <div class="form-group">
                    <label for="inputDatum">Datum</label>
                    <input type="date" value="<?php echo $today; ?>" class="form-control" id="inputDatum" name="datum" style="width:160px;">
                </div>
                <div class="form-group">
                    <label for="inputTijd">Tijd</label>
                    <input type="time" value="<?php echo $currenttime; ?>"class="form-control" id="inputTijd" name="tijd" style="width:160px;">
                </div>
                <div class="form-group">
                    <label for="inputKosten">Kosten</label>
                    <input type="float" class="form-control" id="inputKosten" name="kosten" style="width:100px;">
                </div>
                <div class="form-group">
                    <label for="inputKilometerstand">Kilometerstand</label>
                    <input type="text" class="form-control" id="inputKilometerstand" name="kilometerstand" maxlength="6" style="width:100px;">
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-select" id="inputStatus" name="status" style="width:100px;font-size:0.8rem;">
                        <option value="done" selected>Done</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <br>
                <button
                    type="submit"
                    name="submit"
                    class="btn btn-success"
                    style="font-size:0.80rem;"
                    onclick="Redirect();"
                >Werkorder aanmaken</button>
            </div>

            <?php
            $kenteken = $_GET["kenteken"];
            ?>

            <script>
                function Redirect() {
                    <?php
                    echo "var kenteken ='$kenteken';";
                    ?>
                    var werkzaamheden = document.getElementById('inputWerkzaamheden').value;
                    var datum = document.getElementById('inputDatum').value;
                    var tijd = document.getElementById('inputTijd').value;
                    var status = document.getElementById('inputStatus').value;
                    if(document.getElementById('inputKosten').value == '') {
                        var kosten = '0-00';
                    } else {
                        var kosten = document.getElementById('inputKosten').value.replace(",", "-");
                    }
                    if(document.getElementById('inputKilometerstand').value == '') {
                        var kilometerstand = '000000';
                    } else {
                        var kilometerstand = document.getElementById('inputKilometerstand').value;
                    }

                    location.href = `/nieuw_werkorder/kenteken=${kenteken}/werkzaamheden=${werkzaamheden}/datum=${datum}/tijd=${tijd}/kosten=${kosten}/status=${status}/kilometerstand=${kilometerstand}`;
                }
            </script>

        </div>



    @stop
