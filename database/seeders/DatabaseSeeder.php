<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Country::query()->truncate();
        State::query()->truncate();
        City::query()->truncate();
        foreach (config('locations') as $country => $states) {
            $country = Country::query()->create(['name' => $country]);
            foreach ($states as $state => $cities) {
                $state = State::query()->create(['name' => $state, 'country_id' => $country->id]);
                foreach ($cities as $city) {
                    City::query()->create(['name' => $city, 'state_id' => $state->id]);
                }
            }
        }
    }
}
