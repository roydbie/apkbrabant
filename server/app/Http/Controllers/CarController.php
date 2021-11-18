<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function show($kenteken)
    {
        $werkorders = DB::select("SELECT * FROM planning WHERE kenteken = '$kenteken'");
        $autoinfo = DB::select("SELECT * FROM autos WHERE kenteken = '$kenteken'");
        $subwerkorders = [];
        foreach ($werkorders as $werkorder){
            $subwerkorders_temp = DB::select("SELECT * FROM werkorders WHERE planning_id = '$werkorder->id'");
            foreach ($subwerkorders_temp as $subwerkorder) {
                array_push($subwerkorders, $subwerkorder);
            }
        }

        return view('kentekensearch', ['werkorders' => $werkorders, 'kenteken' => $kenteken, 'autoinfo' => $autoinfo, 'subwerkorders' => $subwerkorders]);
    }

    public function details($id)
    {
        return view('car', ['id' => $id]);
    }

    public function insert($kenteken, $werkzaamheden, $omschrijving, $melddatum, $meldtijd, $ophaaldatum, $ophaaltijd, $status, $kilometerstand)
    {
        DB::insert("INSERT INTO planning (kenteken, werkzaamheden, omschrijving, melddatum, meldtijd, ophaaldatum, ophaaltijd, status, kilometerstand) values ('$kenteken', '$werkzaamheden', '$omschrijving', '$melddatum', '$meldtijd', '$ophaaldatum', '$ophaaltijd', '$status', '$kilometerstand')");
        return redirect("/kentekensearch/kenteken=$kenteken");
    }

    public function insertAuto($kenteken, $merk, $type, $meldcode)
    {
        DB::insert("INSERT INTO autos (kenteken, merk, type, meldcode) values ('$kenteken', '$merk', '$type', '$meldcode')");
        return redirect("/kentekensearch/kenteken=$kenteken");
    }

    public function insertSubwerkorder($kenteken, $planning_id, $omschrijving, $aantal, $kostenPerStuk, $kostenTotaal)
    {
        DB::insert("INSERT INTO werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) values ('$planning_id', '$omschrijving', '$aantal', '$kostenPerStuk', '$kostenTotaal')");
        return redirect("/werkorder?id=$planning_id");
    }

    public function delete($kenteken, $id)
    {
        DB::delete("DELETE FROM planning WHERE id = '$id'");
        return redirect("/kentekensearch/kenteken=$kenteken");
    }

    public function updateStatus($kenteken, $id, $status)
    {
        DB::update("UPDATE planning SET status = '$status' WHERE id = '$id'");
        return redirect("/kentekensearch/kenteken=$kenteken");
    }
}
