<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function show($kenteken)
    {
        $werkorders = DB::select("SELECT * FROM planning WHERE kenteken = '$kenteken'");
        return view('kentekensearch', ['werkorders' => $werkorders]);
    }

    public function details($id)
    {
        return view('car', ['id' => $id]);
    }
}
