@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>GET</strong> /participants</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Get all participants</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>GET</strong> /participants/:participant</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Get a single participant</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>DELETE</strong> /participants/:participant</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Remove a participant</li>
                        <li>Status: 204 No Content</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>POST</strong> /participants</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Create a participant</li>
                        <li>Status: 204</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>PATCH</strong> /participants/:participant</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Create a participant</li>
                        <li>Status: 204</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>POST</strong> /participants/:participant/add/:team</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Add a participant to a team</li>
                        <li>Status: 204</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>POST</strong> /participants/:participant/remove/:team</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Remove a participant to a team</li>
                        <li>Status: 204 No Content</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>GET</strong> /teams</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Get all teams</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>GET</strong> /teams/:team</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Get a specific team</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>DELETE</strong> /teams/:team</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Remove a team</li>
                        <li>Status: 204 No Content</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>POST</strong> /teams</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Create a team</li>
                        <li>Status: 201</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>PATCH</strong> /teams/:teams</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Update a team</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>GET</strong> /teams/:teams/roster</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Get participants on a team</li>
                        <li>Status: 200</li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <strong>POST</strong> teams/:team/captain/:participant</div>
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li>Description: Assign a captain to a team</li>
                        <li>Status: 201</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
