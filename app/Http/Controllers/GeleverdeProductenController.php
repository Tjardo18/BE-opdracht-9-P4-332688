<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeleverdeProductenController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $result = DB::select('CALL getGeleverdeProducten()');

        $data = [
            'title' => 'Geleverde Producten',
            'result' => $result
        ];

        return view('geleverde-producten', $data);
    }

    public function filterByDateRange(Request $request)
    {
        $result = DB::select('CALL getGeleverdeProductenByDateRange(?, ?)', [$request->filter_startDatum, $request->filter_eindDatum]);

        $data = [
            'title' => 'Geleverde Producten',
            'result' => $result
        ];

        return view('geleverde-producten', $data);
    }
}
