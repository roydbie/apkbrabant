@php
    use Illuminate\Support\Facades\DB;
@endphp
@extends('layouts.app')

@section('huidigepagina')
    <h6 style="margin-left:2.5%;margin-top:10px;margin-bottom: 0px!important;">Kenteken profiel</h6>
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

            .tablecss {
                width:90%;
                margin-left:5%;
                font-size:0.8rem;
                text-align:left!important;
                margin-bottom: 50px!important;
                vertical-align: middle;
            }

            .btn {
                font-size: 0.8rem;
            }
        </style>

        <div id="containment-wrapper">
            <div class="mt-2">
                <button class="btn btn-success" onclick="location.href='/nieuw_werkorder?kenteken={{$kenteken}}';">Werkorder aanmaken</button>
                @if (!$autoinfo)
                    <button class="btn btn-warning" onclick="location.href='/nieuw_auto?kenteken={{$kenteken}}';">Auto informatie aanmaken</button>
                @endif
            </div>
            <h1 style="margin-top:20px;">{{strtoupper($kenteken)}}</h1>
            @if ($autoinfo)
                <p>Merk: {{$autoinfo{0}->merk}} &nbsp;&nbsp;&nbsp;Type: {{$autoinfo{0}->type}} &nbsp;&nbsp;&nbsp;Meldcode: {{$autoinfo{0}->meldcode}}</p>
                <p></p>
            @endif

            @if ($werkorders)
                <table class="table my-4 tablecss">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Werkzaamheden</th>
                            <th scope="col">Omschrijving</th>
                            <th scope="col">Melddatum</th>
                            <th scope="col">Meldtijd</th>
                            <th scope="col">Ophaaldatum</th>
                            <th scope="col">Ophaaltijd</th>
                            <th scope="col">Bij km. stand</th>
                            <th scope="col">Status</th>
                            <th scope="col">Verander status naar:</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($werkorders as $werkorder)
                        @if($werkorder->werkzaamheden == 'Reparatie' || $werkorder->werkzaamheden == 'Grote beurt' || $werkorder->werkzaamheden == 'Kleine beurt' || $werkorder->werkzaamheden == 'APK keuring')
                            <tr style=" background-color:#ededed;">
                                <th scope="row">{{$werkorder->id}}</th>
                                <td>{{$werkorder->werkzaamheden}}</td>
                                <td>{{$werkorder->omschrijving}}</td>
                                <td>{{date("d-m-Y", strtotime($werkorder->melddatum))}}</td>
                                <td>{{substr($werkorder->meldtijd, 0, -3)}}</td>
                                <td>{{date("d-m-Y", strtotime($werkorder->ophaaldatum))}}</td>
                                <td>{{substr($werkorder->ophaaltijd, 0, -3)}}</td>
                                <td>{{$werkorder->kilometerstand}}</td>
                                <td>{{$werkorder->status}}</td>
                                <td>
                                    @if ($werkorder->status == 'gerepareerd')
                                        <button class="btn btn-warning btn btn-sm" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'opgehaald')">Opgehaald</button>
                                    @elseif ($werkorder->status == 'in afwachting')
                                        <button class="btn btn-warning btn btn-sm" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'gerepareerd')">Gerepareerd</button>
                                    @elseif ($werkorder->status == 'opgehaald')
                                        <button class="btn btn-danger btn btn-sm" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'in afwachting')">Reset status</button>
                                    @endif
                                </td>
                                <td>
                                    <button id="detailsButton{{$werkorder->id}}" class="btn btn-primary btn-sm" onclick="location.href = '/werkorder?id={{$werkorder->id}}'">Bekijk details</button>
                                    <button class="btn btn-danger btn-sm" onclick="verwijderWerkorder('{{$werkorder->kenteken}}', {{$werkorder->id}});">x</button>
                                </td>
                            </tr>

                            <tr class="<?= "details" . $werkorder->id ?>" style="display: none;">
                                <th scope="col"></th>
                                <th scope="col">Omschrijving</th>
                                <th scope="col">Aantal:</th>
                                <th scope="col">Kosten per stuk:</th>
                                <th scope="col">Kosten totaal:</th>
                            </tr>

                            @php
                            $id = $werkorder->id;
                            $results = DB::select("SELECT * FROM werkorders WHERE planning_id = $id");
                            foreach ($results as $result){
                                echo "<tr style=\"border-color: white;display:none;\" class=\"details$werkorder->id\"><td></td>";
                                echo "<td>$result->omschrijving</td>";
                                echo "<td>$result->aantal</td>";
                                echo "<td>&euro;$result->kosten_per_stuk</td>";
                                echo "<td>&euro;$result->kosten_totaal</td>";
                                echo "</tr>";
                            }
                            if($werkorder->status == 'in afwachting') {
                                echo "<tr id=\"productToevoegenTR\" class=\"details$werkorder->id\" style=\"display:none;\">
                                <td></td>
                                <td>
                                    <input type=\"text\" class=\"form-control\" id=\"inputOmschrijving\" style=\"width:250px;font-size:0.8rem;\">
                                </td>
                                <td>
                                    <select class=\"form-control\" id=\"inputAantal\" style=\"width:50px;font-size:0.8rem;\">
                                        <option value=\"1\" selected>1</option>
                                        <option value=\"1.5\">1.5</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"2.5\">2.5</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"3.5\">3.5</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"4.5\">4.5</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"5.5\">5.5</option>
                                        <option value=\"6\">6</option>
                                    </select>
                                </td>
                                <td>
                                    <input type=\"text\" class=\"form-control\" id=\"inputKostenPerStuk\" style=\"width:75px;font-size:0.8rem;\">
                                </td>
                                <td>
                                    <input type=\"text\" class=\"form-control\" id=\"inputKostenTotaal\" style=\"width:75px;font-size:0.8rem;\">
                                </td>
                                <td><button type=\"button\" class=\"btn btn-success btn\" id=\"\" onclick=\"productToevoegen($werkorder->id, '$werkorder->kenteken');\">Product toevoegen</button></td>
                            </tr>";
                            }
                            @endphp
                        @endif
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 style="margin-top:20px;">Er zijn geen werkorders geregistreerd.</h6>
            @endif

        </div>

        <script>
            function verwijderWerkorder(kenteken, id) {
                if (window.confirm("Weet u zeker dat u dit werkorder wilt verwijderen?"))
                {
                    location.href = `/verwijder_werkorder/kenteken=${kenteken}/id=${id}`;
                }
                else
                {
                    // They clicked no
                }
            }

            function wijzigStatus(kenteken, id, status){
                location.href = `/wijzig_status/kenteken=${kenteken}/id=${id}/status=${status}`;
            }

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

            function showDetails(id) {
                const buttonTekst = document.getElementById(`detailsButton${id}`).innerHTML;
                const cols = document.getElementsByClassName(`details${id}`);
                if (buttonTekst == "Verberg details"){
                    for(let i = 0; i < cols.length; i++) {
                        cols[i].style.display = 'none';
                        document.getElementById(`detailsButton${id}`).innerHTML = "Bekijk details";
                    }
                } else {
                    for(let i = 0; i < cols.length; i++) {
                        cols[i].style.display = 'table-row';
                        document.getElementById(`detailsButton${id}`).innerHTML = "Verberg details";
                    }
                }

            }
            function hideDetails(id) {
                const cols = document.getElementsByClassName(`details${id}`);
                for(let i = 0; i < cols.length; i++) {
                    cols[i].style.display = 'none';
                }
            }
        </script>



    @stop
