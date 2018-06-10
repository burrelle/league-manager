@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <ul>
                        <li><a href="/docs">API Documentation</a></li>
                        <li><a href="/participants/create">Create a Participant</a></li>
                        <li><a href="/teams/create">Create a Team</a></li>
                        <li><a href="/rosters">View Roster by Team</a></li>
                        <li><a href="/assign">Assign a Participant to Team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
