<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GetCovidInfo;
use App\Models\User;
use DataTables;

class CovidInfoController extends Controller
{
    private $api_service;

    public function __construct()
    {
        $this->api_service = New GetCovidInfo();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->api_service->casesInAllCountries();
            return Datatables::of($data)->make(true);
        }

        return view('frontend.all-countries.list');
    }

    public function getCovidInfoIndia(Request $request)
    {
        if ($request->ajax()) {
            $response = $this->api_service->getCasesInfoIndia();
            $data = $response->data->regional;
            return Datatables::of($data)->make(true);
        }

        return view('frontend.india.list');
    }
}
