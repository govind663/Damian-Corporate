<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\InternationalAssociates;
use App\Models\Introduction;
use App\Models\Showroom;
use App\Models\ManufacturingFacility;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Vision;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about(){

        // ==== Fetch Introduction
        $introductions = Introduction::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->first();

        // ==== Fetch Showroom
        $showrooms = Showroom::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->get();

        // ==== Fetch ManufacturingFacility
        $manufacturing_facilities = ManufacturingFacility::orderBy("id","asc")->where('status',1)->whereNull('deleted_at')->get();
        // dd($manufacturing_facilities);

        // ==== Fetch Vision
        $visions = Vision::orderBy("id","desc")->where('status',1)->whereNull('deleted_at')->first();
        // dd($visions);

        // ===== Fetch Teams
        $teams = Team::orderBy("id","ASC")->whereNull('deleted_at')->get();

        // ===== Fetch Team Members
        $team_members = TeamMember::orderBy("id","ASC")->where('status',1)->whereNull('deleted_at')->get()->groupBy('team_id');

        // ==== Fetch InternationalAssociates
        $international_associates = InternationalAssociates::orderBy("id","ASC")->where('status',1)->whereNull('deleted_at')->get();

        return view('frontend.about', [
            'introductions' => $introductions,
            'showrooms' => $showrooms,
            'manufacturing_facilities' => $manufacturing_facilities,
            'visions' => $visions,
            'teams' => $teams,
            'team_members' => $team_members,
            'international_associates' => $international_associates
        ]);
    }
}
