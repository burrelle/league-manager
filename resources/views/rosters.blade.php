@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roster by Team</div>
                <div class="card-body">
                    <roster-component></roster-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection