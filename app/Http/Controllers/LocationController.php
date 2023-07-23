<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    

use App\Models\Provinces;
use App\Models\Regencies;
use App\Models\Disricts;
use App\Models\Villages;

class LocationController extends Controller
{

    public function index()
    {
        return view ('Location');
    }

    public function getProvinces()
    {
        $provinces = Provinces::all();
        return response()->json($provinces);
    }

    public function getRegenciesByProvince($province_id)
    {
        $regencies = Regencies::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistrictsByRegency($regencies_id)
    {
        $disricts = Disricts::where('regency_id', $regencies_id)->get();
        return response()->json($disricts);
    }

    public function getVillagesByDistrict($disricts_id)
    {
        $villages = Villages::where('district_id', $disricts_id)->get();
        return response()->json($villages);
    }
}
