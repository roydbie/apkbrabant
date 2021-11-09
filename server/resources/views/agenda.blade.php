@extends('layouts.app')

@section('content')

<style>
    #containment-wrapper {
        width: 95%;
        margin-left:2.5%;
        height:34vw;
        padding: 10px;
        text-align: center;
        background-color:white;
        border-radius: 10px;
        box-shadow: 0px 5px 10px #dedede;
    }

    .agenda-header {
        width:100%;
        display:inline-block;
        margin-bottom:20px;
    }

    .agenda-afspraak {
        width:50%;
        height:50px;
        background-color: #ededed;
        margin: 10px auto;
        padding: 15px 10px 10px;
        border-radius: 5px;
    }

    .agenda-afspraak-tijd{
        display: inline-block;
        font-weight: bold;
        margin-left: 40px;
    }

    .agenda-afspraak-kenteken{
        display: inline-block;
    }

    .agenda-afspraak-werkzaamheden{
        display: inline-block;
    }

    .agenda-afspraak-acties{
        display: inline-block;
        margin-right: 40px;
    }
</style>

<?php
    use Illuminate\Support\Facades\DB;

    $vandaag = new DateTime(date("Y-m-d"));
    $geselecteerde_datum = isset($_GET["datum"]) ? new DateTime($_GET["datum"]) : new DateTime(date("Y-m-d"));

?>



<div id="containment-wrapper">
    <div class="pt-3 mx-5">
        <div class="agenda-header">
            <div class="row" style="width:50%;margin:auto;">
                <h2 class="mb-3" style="display:inline-block;margin-bottom:0;font-weight:400;">
                    <?php
                    if ($geselecteerde_datum->format('Y-m-d') == date("Y-m-d")){
                        echo "Vandaag";
                    } elseif ($geselecteerde_datum->format('Y-m-d') == date('Y-m-d', strtotime("-1 day",  strtotime(date('Y-m-d'))))) {
                        echo "Gisteren";
                    } elseif ($geselecteerde_datum->format('Y-m-d') == date('Y-m-d', strtotime("+1 day",  strtotime(date('Y-m-d'))))) {
                        echo "Morgen";
                    } else {
                        echo $geselecteerde_datum->format('d-m-Y');
                    }

                    ?>
                </h2>
                <div class="col">
                    <button type="button" id="<?= date('Y-m-d', strtotime("-1 day", strtotime($geselecteerde_datum->format('Y-m-d'))))?>" class="btn btn-success btn-sm" onclick="DatumChange(this.id);"
                            style="display:inline-block;border-radius:50%;">
                        <b>&nbsp;<&nbsp;</b>
                    </button>
                    <button type="button" id="<?= date('Y-m-d', strtotime("+1 day", strtotime($geselecteerde_datum->format('Y-m-d'))))?>" class="btn btn-success btn-sm" onclick="DatumChange(this.id);"
                            style="display:inline-block;border-radius:50%;">
                        <b>&nbsp;>&nbsp;</b>
                    </button>
                    <?php
                    if ($vandaag != $geselecteerde_datum){
                        echo "<button type=\"button\" class=\"btn btn-success btn\" onclick=\"DatumChange('vandaag');\"
                            style=\"display:inline-block;margin-left:10px;font-size:0.8rem;\">
                            Naar vandaag
                            </button>";
                    }
                    ?>
                </div>
                <div class="col">
                    <input type="date" id="birthday" name="birthday" class="form-control" style="font-size:0.8rem;width:50%;margin:auto;text-align: center;"
                           value="<?= $geselecteerde_datum->format('Y-m-d'); ?>" onchange="DatumChange(this.value);">
                </div>
            </div>
        </div>
        <div class="agenda-afspraak row">
            <p class="agenda-afspraak-tijd col">Meldtijd</p>
            <p class="agenda-afspraak-kenteken col"><b>Kenteken</b></p>
            <p class="agenda-afspraak-werkzaamheden col"><b>Werkzaamheden</b></p>
            <p class="agenda-afspraak-acties col"><b>Acties</b></p>
        </div>
        <?php
        $datum = $geselecteerde_datum->format("Y-m-d");
        $results = DB::select("SELECT * FROM planning WHERE melddatum = '$datum'");
        foreach ($results as $result){
            echo "<div class=\"agenda-afspraak row\"><p class=\"agenda-afspraak-tijd col\">";
            echo substr($result->meldtijd, 0, -3);
            echo "</p><p class=\"agenda-afspraak-kenteken col\">";
            echo $result->kenteken;
            echo "</p><p class=\"agenda-afspraak-werkzaamheden col\">";
            echo $result->werkzaamheden;
            echo "</p>";
            echo "<p class=\"agenda-afspraak-acties col\"><button type=\"button\" class=\"btn btn-primary btn-sm\" style=\"margin-top:-5px;\" onclick=\"location.href = '/kentekensearch/kenteken=$result->kenteken'\">Bekijk</button></p></div>";
        }
        ?>
    </div>
</div>

    <script>
        function DatumChange(geselecteerdeDatum) {
            if (geselecteerdeDatum === "vandaag"){
                var today = new Date();
                var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                location.href = `/agenda?melddatum=${date}`;
            } else {
                location.href = `/agenda?melddatum=${geselecteerdeDatum}`;
            }

        }
    </script>

@stop
