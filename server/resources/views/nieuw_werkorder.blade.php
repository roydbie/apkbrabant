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

    @section('huidigepagina')
        <h6 style="margin-left:2.5%;margin-top:10px;margin-bottom: 0px!important;">Kenteken profiel > Nieuw werkorder</h6>
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
            <h1 style="margin-top:20px;">Nieuw werkorder <?php print strtoupper($_GET["kenteken"])?></h1>

            <div class="form-nieuw-werkorder">
                <table>
                    <tr>
                        <td width="200">Werkzaamheden</td>
                        <td>
                            <select class="form-select" id="inputWerkzaamheden" name="werkzaamheden" style="width:300px;font-size:0.8rem;">
                                <option value="Reparatie" selected>Reparatie</option>
                                <option value="Kleine beurt">Kleine beurt</option>
                                <option value="Grote beurt">Grote beurt</option>
                                <option value="APK keuring">APK Keuring</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Omschrijving</td>
                        <td>
                            <input type="text" class="form-control" id="inputOmschrijving" name="omschrijving" style="width:300px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Melddatum</td>
                        <td>
                            <input type="date" value="<?php echo $today; ?>" class="form-control" id="inputMelddatum" name="melddatum" style="width:160px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Meldtijd</td>
                        <td>
                            <input type="time" step="1800" value="<?php echo $currenttime; ?>"class="form-control" id="inputMeldtijd" name="meldtijd" style="width:160px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Ophaaldatum</td>
                        <td>
                            <input type="date" value="<?php echo $today; ?>" class="form-control" id="inputOphaaldatum" name="ophaaldatum" style="width:160px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Ophaaltijd</td>
                        <td>
                            <input type="time" value="17:00:00"class="form-control" id="inputOphaaltijd" name="ophaaltijd" style="width:160px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Kilometerstand</td>
                        <td>
                            <input type="text" class="form-control" id="inputKilometerstand" name="kilometerstand" maxlength="6" style="width:300px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Status</td>
                        <td>
                            <select class="form-select" id="inputStatus" name="status" style="width:300px;font-size:0.8rem;">
                                <option value="in afwachting" selected>In afwachting</option>
                                <option value="gerepareerd">Gerepareerd</option>
                                <option value="opgehaald">Opgehaald</option>
                            </select>
                        </td>
                    </tr>
                </table>
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
                    var melddatum = document.getElementById('inputMelddatum').value;
                    var meldtijd = document.getElementById('inputMeldtijd').value;
                    var ophaaldatum = document.getElementById('inputOphaaldatum').value;
                    var ophaaltijd = document.getElementById('inputOphaaltijd').value;
                    var status = document.getElementById('inputStatus').value;
                    if(document.getElementById('inputKilometerstand').value == '') {
                        var kilometerstand = '000000';
                    } else {
                        var kilometerstand = document.getElementById('inputKilometerstand').value;
                    }
                    if(document.getElementById('inputOmschrijving').value == '') {
                        var omschrijving = werkzaamheden;
                    } else {
                        var omschrijving = document.getElementById('inputOmschrijving').value;
                    }

                    location.href = `/nieuw_werkorder/kenteken=${kenteken}/werkzaamheden=${werkzaamheden}/omschrijving=${omschrijving}/melddatum=${melddatum}/meldtijd=${meldtijd}/ophaaldatum=${ophaaldatum}/ophaaltijd=${ophaaltijd}/status=${status}/kilometerstand=${kilometerstand}`;
                }
            </script>

        </div>



    @stop
