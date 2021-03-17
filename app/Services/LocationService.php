<?php


namespace App\Services;


use App\Models\City;
use App\Models\Country;
use App\Models\State;

class LocationService
{
    public function getCountryNameId()
    {
        return Country::query()->get(["name", "id"]);
    }

    public function getStateNameIdByCountry($id)
    {
        return State::query()->where("country_id", $id)->get(["name", "id"]);
    }

    public function getCityNameIdByState($id)
    {
        return City::query()->where("state_id", $id)->get(["name", "id"]);
    }
}
