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
        return view('kentekensearch', ['werkorders' => $werkorders, 'kenteken' => $kenteken, 'autoinfo' => $autoinfo]);
    }

    public function details($id)
    {
        return view('car', ['id' => $id]);
    }

    public function insert($kenteken, $werkzaamheden, $datum, $tijd, $kosten, $status, $kilometerstand)
    {
        $nieuwe_kosten = str_replace("-", ".", $kosten);
        DB::insert("INSERT INTO planning (kenteken, werkzaamheden, datum, tijd, kosten, status, kilometerstand) values ('$kenteken', '$werkzaamheden', '$datum', '$tijd', '$nieuwe_kosten', '$status', '$kilometerstand')");
        return redirect("/kentekensearch/kenteken=$kenteken");
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
