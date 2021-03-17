<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $data['countries'] = $this->locationService->getCountryNameId();
        return view('country-state-city', $data);
    }

    public function getState(Request $request)
    {
        $data['states'] = $this->locationService->getStateNameIdByCountry($request->country_id);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = $this->locationService->getCityNameIdByState($request->state_id);
        return response()->json($data);
    }
}
