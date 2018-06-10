@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assign a player to team</div>
                <div class="card-body">
                    <team-component></team-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
