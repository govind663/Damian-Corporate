<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\TeamRequest;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.teams.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $request->validated();
        try {

            $team = new Team();

            $team->team_name = $request->team_name;
            $team->inserted_at = Carbon::now();
            $team->inserted_by = Auth::user()->id;
            $team->save();

            return redirect()->route('team.index')->with('message','Team has been successfully created.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);

        return view('backend.teams.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $request->validated();

        try {

            $team = Team::findOrFail($id);

            $team->team_name = $request->team_name;
            $team->modified_at = Carbon::now();
            $team->modified_by = Auth::user()->id;
            $team->save();

            return redirect()->route('team.index')->with('message', 'Team has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the category. Please try again.');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {

            $team = Team::findOrFail($id);
            $team->update($data);

            return redirect()->route('team.index')->with('message','Team has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
