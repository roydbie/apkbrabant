<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function show($kenteken)
    {
        $werkorders = DB::select("SELECT * FROM planning WHERE kenteken = '$kenteken'");
        return view('kentekensearch', ['werkorders' => $werkorders, 'kenteken' => $kenteken]);
    }

    public function details($id)
    {
        return view('car', ['id' => $id]);
    }

    public function insert($kenteken, $werkzaamheden, $datum, $tijd, $kosten)
    {
        $nieuwe_kosten = str_replace("-", ".", $kosten);
        DB::insert("INSERT INTO planning (kenteken, werkzaamheden, datum, tijd, kosten) values ('$kenteken', '$werkzaamheden', '$datum', '$tijd', '$nieuwe_kosten')");
        $werkorders = DB::select("SELECT * FROM planning WHERE kenteken = '$kenteken'");
        return redirect("/kentekensearch/kenteken=$kenteken");
    }
}
