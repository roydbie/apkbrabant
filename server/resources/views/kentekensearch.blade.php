
@extends('layouts.app')

    @section('content')
        <style>
            #containment-wrapper {
                width: 93.5%;
                margin-left:50px;
                min-height:600px;
                margin-bottom:50px;
                padding: 10px;
                text-align: center;
                background-color:white;
                border-radius: 10px;
                box-shadow: 0px 5px 10px #dedede;
            }

            .tablecss {
                width:70%;
                margin-left:15%;
                font-size:0.8rem;
                text-align:left!important;
            }

            .btn {
                font-size: 0.8rem;
            }
        </style>

        <div id="containment-wrapper">
            <div class="mt-2">
                <button class="btn btn-success" onclick="location.href='/nieuw_werkorder?kenteken={{$kenteken}}';">Werkorder aanmaken</button>
            </div>
            <h1 style="margin-top:20px;">{{strtoupper($kenteken)}}</h1>
            @if ($autoinfo)
                <p>Merk: {{$autoinfo{0}->merk}} &nbsp;&nbsp;&nbsp;Type: {{$autoinfo{0}->type}} &nbsp;&nbsp;&nbsp;Meldcode: {{$autoinfo{0}->meldcode}}</p>
                <p></p>
            @endif

            @if ($werkorders)
                <table class="table mt-4 tablecss">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Werkzaamheden</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Tijd</th>
                            <th scope="col">Bij km. stand</th>
                            <th scope="col">Status</th>
                            <th scope="col">Verander status naar:</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($werkorders as $werkorder)
                        <tr>
                            <th scope="row">{{$werkorder->id}}</th>
                            <td>{{$werkorder->werkzaamheden}}</td>
                            <td>{{date("d-m-Y", strtotime($werkorder->datum))}}</td>
                            <td>{{substr($werkorder->tijd, 0, -3)}}</td>
                            <td>{{$werkorder->kilometerstand}}</td>
                            <td>{{$werkorder->status}}</td>
                            <td>
                                @if ($werkorder->status == 'gerepareerd')
                                    <button class="btn btn-warning btn" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'opgehaald')">Opgehaald</button>
                                @elseif ($werkorder->status == 'in afwachting')
                                    <button class="btn btn-warning btn" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'gerepareerd')">Gerepareerd</button>
                                @elseif ($werkorder->status == 'opgehaald')
                                    <button class="btn btn-danger btn" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'in afwachting')">Reset status</button>
                                @endif
                            </td>
                        </tr>

                        @if($werkorder->status == 'in afwachting')

                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Omschrijving</th>
                            <th scope="col">Aantal:</th>
                            <th scope="col">Kosten per stuk:</th>
                            <th scope="col">Kosten totaal:</th>
                        </tr>
                        <!-- hier een for loop van maken-->
                        @foreach ($subwerkorders as $subwerkorder)
                            @if($subwerkorder->planning_id == $werkorder->id)
                                <tr>
                                    <td></td>
                                    <td>{{$subwerkorder->omschrijving}}</td>
                                    <td>{{$subwerkorder->aantal}}</td>
                                    <td>&euro;{{$subwerkorder->kosten_per_stuk}}</td>
                                    <td>&euro;{{$subwerkorder->kosten_totaal}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr id="productToevoegenTR">
                            <td></td>
                            <td>
                                <input type="text" class="form-control" id="inputOmschrijving" style="width:250px;font-size:0.8rem;">
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <input type="text" class="form-control" id="inputKostenPerStuk" style="width:75px;font-size:0.8rem;">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="inputKostenTotaal" style="width:75px;font-size:0.8rem;">
                            </td>
                            <td><button type="button" data-toggle="modal" class="btn btn-success btn" onclick="productToevoegen({{$subwerkorder->planning_id}}, '{{$werkorder->kenteken}}');">Product toevoegen</button></td>
                        </tr>

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
        </script>



    @stop
