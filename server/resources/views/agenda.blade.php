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
</style>

<?php
    use Illuminate\Support\Facades\DB;

    $vandaag = new DateTime(date("Y-m-d"));
    $geselecteerde_datum = isset($_GET["melddatum"]) ? new DateTime($_GET["melddatum"]) : new DateTime(date("Y-m-d"));

?>



<div id="containment-wrapper" class="pt-5">
    <?php
    $weeknummer = isset($_GET["weeknummer"]) ? $_GET["weeknummer"] : date("W");
    $week_array = getStartAndEndDate($weeknummer,date('Y'));
    $datumbegin = new DateTime($week_array["week_start"]);
    ?>
    <div class="row mx-3 my-3">
        <?php
        $a = $_GET["gebruikdatum"];
        for ($x = 0; $x <= 52; $x+=1) {
            if ($x == $weeknummer){
                if ($x == 52){
                    echo "<div id=\"week$x\" class=\"col bg-success text-white py-2\" style=\"margin:0;padding:0;cursor:pointer;background-color: #70b580;\" onclick=\"changeWeek('$x', '$a');\">$x</div>";
                } else {
                    echo "<div id=\"week$x\" class=\"col bg-success text-white py-2\" style=\"border: 2px solid white;margin:0;padding:0;cursor:pointer;background-color: #70b580;\" onclick=\"changeWeek('$x', '$a');\"><span></span></div>";
                }
            } else {
                if ($x == 52){
                    echo "<div id=\"week$x\" class=\"col py-2\" style=\"border: 2px solid white;margin:0;padding:0;cursor:pointer;background-color: #afccb9;\" onclick=\"changeWeek('$x', '$a');\">$x</div>";
                } else {
                    echo "<div id=\"week$x\" class=\"col py-2\" style=\"border: 2px solid white;margin:0;padding:0;cursor:pointer;background-color: #afccb9;\" onclick=\"changeWeek('$x', '$a');\">$x</div>";
                }
            }
        }
        ?>
    </div>

    <div class="row mx-3 mt-4 mb-3">
        <div class="col" style="text-align: left">

        </div>
        <div class="col" style="text-align: center">
            <h3>Week <?= $_GET["weeknummer"]?></h3>
        </div>
        <div class="col" style="text-align: right">
            Sorteer op:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if ($_GET["gebruikdatum"] == "ophaaldatum"){
                echo "<button id=\"ophaaldatumbutton\" type=\"button\" class=\"btn btn-success btn-sm mx-1\" onclick=\"changeGebruikdatum(" . date('W') . ", 'ophaaldatum')\">Ophaaldatum</button>";
                echo "<button id=\"melddatumbutton\" type=\"button\" class=\"btn btn-outline-success btn-sm mx-1\" onclick=\"changeGebruikdatum(" . date('W') . ", 'melddatum')\">Melddatum</button>";
            } else {
                echo "<button id=\"ophaaldatumbutton\" type=\"button\" class=\"btn btn-outline-success btn-sm mx-1\" onclick=\"changeGebruikdatum(" . date('W') . ", 'ophaaldatum')\">Ophaaldatum</button>";
                echo "<button id=\"melddatumbutton\" type=\"button\" class=\"btn btn-success btn-sm mx-1\" onclick=\"changeGebruikdatum(" . date('W') . ", 'melddatum')\">Melddatum</button>";
            }
            ?>
        </div>
    </div>

    <div class="row mx-3 agenda">
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime($datumbegin->format('Y-m-d'))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime($datumbegin->format('Y-m-d'))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime($datumbegin->format('Y-m-d')));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE '$gebruikdatum' = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+1 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+1 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+1 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+2 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+2 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+2 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+3 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+3 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+3 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+4 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+4 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+4 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+5 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+5 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+5 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
        <div class="col">
            <div class="bg-success text-white py-3 my-1">
                <b><?php echo date('l', strtotime("+6 day", strtotime($datumbegin->format('Y-m-d')))); ?></b>
                <br>
                <?php echo date('d-m-Y', strtotime("+6 day", strtotime($datumbegin->format('Y-m-d')))); ?>
            </div>
            <?php
            $datum = date('Y-m-d', strtotime("+6 day", strtotime($datumbegin->format('Y-m-d'))));
            $gebruikdatum = $_GET["gebruikdatum"];
            $results = DB::select("SELECT * FROM planning WHERE " . $gebruikdatum . " = '$datum'");
            $items = 0;
            foreach ($results as $result){
                echo "<div class=\"col py-2 my-1 px-4\" style=\"border-left: 6px solid #458059;background-color: #afccb9;border-radius: 0px 20px 20px 0px;text-align:left; \">";
                echo substr($result->{str_replace('datum', '', $gebruikdatum) . 'tijd'}, 0, -3);
                echo "<br>";
                echo $result->werkzaamheden;
                echo "<br>";
                echo $result->omschrijving;
                echo "<br>";
                echo $result->kenteken;
                echo "</div>";
                $items = $items + 1;
            }
            if ($items > 0){
                echo "<div class=\"col bg-secondary text-white py-3 my-1\">Items: ";
                echo $items;
                echo "</div>";
            }
            ?>
        </div>
    </div>

</div>

<?php
function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('Y-m-d');
    $dto->modify('+6 days');
    $ret['week_end'] = $dto->format('Y-m-d');
    return $ret;
}
?>

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

        function changeWeek(week, gebruikdatum) {
            location.href = `/agenda?weeknummer=${week}&gebruikdatum=${gebruikdatum}`;
        }

        function changeGebruikdatum(week, gebruikdatum) {
            location.href = `/agenda?weeknummer=${week}&gebruikdatum=${gebruikdatum}`;
        }
    </script>

@stop
