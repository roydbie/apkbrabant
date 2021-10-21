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
                <button class="btn btn-primary" onclick="">Factuur maken</button>
                <button class="btn btn-warning" onclick="">APK keuring</button>
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
                            <th scope="col">Kosten</th>
                            <th scope="col">Bij km. stand</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($werkorders as $werkorder)
                        <tr>
                            <th scope="row">{{$werkorder->id}}</th>
                            <td>{{$werkorder->werkzaamheden}}</td>
                            <td>{{date("d-m-Y", strtotime($werkorder->datum))}}</td>
                            <td>{{$werkorder->tijd}}</td>
                            <td>&euro;{{$werkorder->kosten}} ex. BTW</td>
                            <td>{{$werkorder->kilometerstand}}</td>
                            <td>{{$werkorder->status}}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="verwijderWerkorder('{{$werkorder->kenteken}}', {{$werkorder->id}})">x</button>
                                @if ($werkorder->status == 'done')
                                <button class="btn btn-warning btn-sm" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'pending')">Maak pending</button>
                                @elseif ($werkorder->status == 'pending')
                                <button class="btn btn-warning btn-sm" onclick="wijzigStatus('{{$werkorder->kenteken}}', {{$werkorder->id}}, 'done')">Maak done</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 style="margin-left:50px;margin-top:20px;">Er zijn geen werkorders geregistreerd.</h6>
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
        </script>



    @stop
