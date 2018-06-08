@extends('layouts.app') 
@section('content')
<div class="container">
    <form action="/api/teams" method="POST">
        @csrf
        <div class="form-group">
            <label for="teamName">Team Name</label>
            <input type="text" class="form-control" id="teamName" name="teamName" aria-describedby="emailHelp" placeholder="Enter your team name...">
        </div>
        <div class="form-group">
            <label for="league">League</label>
            <select class="form-control" id="league" name="league">
                <option value="baseball">Baseball</option>
                <option value="baskeball">Basketball</option>
                <option value="football">Football</option>
                <option value="hockey">Hockey</option>
                <option value="rugby">Rugby</option>
                <option value="lacrosse">Lacrosse</option>
                <option value="soccer">Soccer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
