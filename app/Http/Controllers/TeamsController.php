<?php

namespace App\Http\Controllers;

use DB;
use App\Team;
use App\Participant;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Team::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return $team;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(null, 204);
    }

    /**
     * Get roster resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function teamRoster(Team $team)
    {
        return DB::table('participants')->where('team_id', $team->id)->get();
    }

    /**
     * Add a captain to a specific team.
     *
     * @param  \App\Team  $team
     * @param  \App\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function addCaptain(Team $team, Participant $participant)
    {
        $team->update(['captain' => $participant->id]);
        $participant->update(["team_id" => $team->id]);
    }
}
