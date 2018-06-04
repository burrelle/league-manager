<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use App\Team;
use DB;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Participant::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Link to a Vue Component
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Participant::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        return $participant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        // TODO: Edit a participant form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        $participant->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        $team = DB::table('teams')->where('captain', $participant->id)->get();
        if($team == null) {
            $participant->delete();
            return response()->json(null, 204);
        }
        else {
            foreach((array)$team as $team){
                DB::table('teams')->where('id', $team[0]->id)->update(['captain' => null]);
            }
            $participant->delete();
            return response()->json(null, 204);
        }
    }

    /**
     * Add a player to a team
     * 
     * @param  \App\Participant  $participant
     * @param \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function addToTeam(Participant $participant, Team $team)
    {
        $participant->update(['team_id' => $team->id]);
    }

    /**
     * Remove a player from a team
     * 
     * @param  \App\Participant  $participant
     * @param \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function removeFromTeam(Participant $participant, Team $team)
    {
        $participant->update(['team_id' => null]);
    }
}
