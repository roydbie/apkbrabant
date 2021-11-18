@extends('layouts.app')

@section('huidigepagina')
    <h6 style="margin-left:2.5%;margin-top:10px;margin-bottom: 0px!important;">Kenteken profiel > Werkorder</h6>
@stop

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

<div id="containment-wrapper">
    <?php
    use Illuminate\Support\Facades\DB;
    $totale_kosten = 0;
    $results = DB::select("SELECT * FROM planning WHERE id = " . $_GET["id"] . ";");
    $werkorder = $results[0];
    echo "<h1>$werkorder->werkzaamheden $werkorder->kenteken op " . date('d-m-Y', strtotime($werkorder->ophaaldatum)) . "</h1>";
    $results2 = DB::select("SELECT * FROM werkorders WHERE planning_id = " . $_GET["id"] . ";");
    ?>
    <div class="row">
        <div class="col">
            <h4>Werkzaamheden</h4>
            <table class="table table-striped" style="width:90%;margin:auto;text-align: left!important;">
                <thead>
                <tr>
                    <th scope="col">Omschrijving</th>
                    <th scope="col">Aantal</th>
                    <th scope="col">Kosten per stuk</th>
                    <th scope="col">Kosten totaal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($results2 as $regel){
                    echo "<tr>";
                    echo "<td>$regel->omschrijving</td>";
                    echo "<td>$regel->aantal</td>";
                    echo "<td>&euro;$regel->kosten_per_stuk</td>";
                    echo "<td>&euro;$regel->kosten_totaal</td>";
                    echo "</tr>";
                    $totale_kosten = $totale_kosten + $regel->kosten_totaal;
                }
                echo "<tr>";
                echo "<td><b>Totaal</b></td>";
                echo "<td>&nbsp;</td>";
                echo "<td>&nbsp;</td>";
                echo "<td>&euro;$totale_kosten</td>";
                echo "</tr>";
                ?>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h4>Werkzaamheden toevoegen</h4>
            <form style="width:90%;margin:auto;text-align: left!important;">
                <div class="form-group row mb-1 mt-3">
                    <label for="inputOmschrijving" class="col-sm-2 col-form-label">Omschrijving</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputOmschrijving" style="font-size: 0.8rem;width:500px;">
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="inputAantal" class="col-sm-2 col-form-label">Aantal</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="inputAantal" style="width:50px;font-size:0.8rem;">
                            <option value="1" selected>1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                            <option value="3.5">3.5</option>
                            <option value="4">4</option>
                            <option value="4.5">4.5</option>
                            <option value="5">5</option>
                            <option value="5.5">5.5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="inputKostenPerStuk" class="col-sm-2 col-form-label">Kosten per stuk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputKostenPerStuk" style="width:75px;font-size:0.8rem;">
                    </div>
                </div>
                <div class="form-group row my-1">
                    <label for="inputKostenTotaal" class="col-sm-2 col-form-label">Kosten totaal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputKostenTotaal" style="width:75px;font-size:0.8rem;">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="inputKostenTotaal" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-success btn-sm" onclick="productToevoegen({{$werkorder->id}}, '{{$werkorder->kenteken}}');">Werk toevoegen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const inputKostenPerStuk = document.getElementById('inputKostenPerStuk');
        const inputAantal = document.getElementById('inputAantal');

        inputAantal.addEventListener('change', (event) => {
            const aantal = inputAantal.value;
            const kostenPerStuk = inputKostenPerStuk.value;
            const kostenTotaal = aantal * kostenPerStuk;
            document.getElementById('inputKostenTotaal').value = Math.round(kostenTotaal * 100) / 100;
        });
        inputKostenPerStuk.addEventListener('change', (event) => {
            const aantal = inputAantal.value;
            const kostenPerStuk = inputKostenPerStuk.value;
            const kostenTotaal = aantal * kostenPerStuk;
            document.getElementById('inputKostenTotaal').value = Math.round(kostenTotaal * 100) / 100;
        });

        function productToevoegen(planning_id, kenteken){
            const omschrijving = document.getElementById('inputOmschrijving').value;
            const aantal = document.getElementById('inputAantal').value;
            const kostenPerStuk = document.getElementById('inputKostenPerStuk').value;
            const kostenTotaal = document.getElementById('inputKostenTotaal').value;
            location.href = `/nieuw_subwerkorder/kenteken=${kenteken}/planning_id=${planning_id}/omschrijving=${omschrijving}/aantal=${aantal}/kostenPerStuk=${kostenPerStuk}/kostenTotaal=${kostenTotaal}`;
        }
    </script>

</div>

@stop
