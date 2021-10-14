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

            .tablecss {
                width:70%;
                margin-left:15%;
                font-size:0.8rem;
                text-align:left!important;
            }
        </style>

        <div id="containment-wrapper">
            <div class="mt-2">
                <button class="btn btn-warning" onclick="location.href='/nieuw_werkorder?kenteken={{$kenteken}}';">Nieuw werkorder</button>
                <button class="btn btn-warning" onclick="">Iets anders</button>
            </div>
            <h1 style="margin-top:20px;">{{strtoupper($kenteken)}}</h1>
            @if ($werkorders)
                <table class="table mt-4 tablecss">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Werkzaamheden</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Tijd</th>
                            <th scope="col">Kosten</th>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 style="margin-left:50px;margin-top:20px;">Er zijn geen werkorders geregistreerd.</h6>
            @endif

        </div>



    @stop
