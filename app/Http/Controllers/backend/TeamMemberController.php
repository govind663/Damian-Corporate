<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\TeamMemberRequest;
use App\Models\TeamMember;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team_members = TeamMember::with('team')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.team_member.index', [
            'team_members' => $team_members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.team_member.create', [
            'teams' => $teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamMemberRequest $request)
    {
        $request->validated();

        try {

            $team_member = new TeamMember();

            // ==== Upload (member_profile_image)
            if ($request->hasFile('member_profile_image')) {
                $image = $request->file('member_profile_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/team_member/member_profile_image/'), $new_name);

                $image_path = "/damian_corporate/team_member/member_profile_image/" . $new_name;
                $team_member->member_profile_image = $new_name;
            }

            $team_member->team_id = $request->team_id;
            $team_member->name = $request->name;
            $team_member->designation = $request->designation;
            $team_member->status = $request->status;
            $team_member->inserted_at = Carbon::now();
            $team_member->inserted_by = Auth::user()->id;
            $team_member->save();

            return redirect()->route('team-member.index')->with('message','Team Member has been successfully created.');

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
        $team_member = TeamMember::findOrFail($id);

        $teams = Team::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.team_member.edit', [
            'team_member' => $team_member,
            'teams' => $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamMemberRequest $request, string $id)
    {
        $request->validated();

        try {

            $team_member = TeamMember::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('member_profile_image')) {
                // Delete the old image if it exists
                if ($team_member->member_profile_image) {
                    $oldImagePath = public_path('/damian_corporate/team_member/member_profile_image/' . $team_member->member_profile_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('member_profile_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/damian_corporate/team_member/member_profile_image/'), $new_name);

                // Update the banner object with the new image path
                $team_member->member_profile_image = $new_name;
            }

            $team_member->team_id = $request->team_id;
            $team_member->name = $request->name;
            $team_member->designation = $request->designation;
            $team_member->status = $request->status;
            $team_member->modified_at = Carbon::now();
            $team_member->modified_by = Auth::user()->id;
            $team_member->save();

            return redirect()->route('team-member.index')->with('message', 'Team Member has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong while updating the introduction. Please try again.');

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

            $team_member = TeamMember::findOrFail($id);
            $team_member->update($data);

            return redirect()->route('team-member.index')->with('message','Team Member has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
