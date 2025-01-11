<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([
            [
                'state_name' => 'Andhra Pradesh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Arunachal Pradesh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Assam',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Bihar',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Chhattisgarh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Goa',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Gujarat',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Haryana',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Himachal Pradesh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Jharkhand',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Karnataka',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Kerala',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Madhya Pradesh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Maharashtra',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Manipur',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Meghalaya',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Mizoram',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Nagaland',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Odisha',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Punjab',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Rajasthan',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Sikkim',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Tamil Nadu',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Telangana',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Tripura',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Uttar Pradesh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Uttarakhand',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'West Bengal',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            // Union Territories
            [
                'state_name' => 'Andaman and Nicobar Islands',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Chandigarh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Dadra and Nagar Haveli and Daman and Diu',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Delhi',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Lakshadweep',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Puducherry',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Ladakh',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
            [
                'state_name' => 'Jammu and Kashmir',
                'status' => 1,
                'inserted_by' => 1,
                'inserted_at' => Carbon::now(),
            ],
        ]);
    }
}
