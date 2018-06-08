@extends('layouts.app') @section('content')
<div class="container">
    <form action="/api/participants" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First" required>
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last" required>
            </div>
        </div>
        <div class="form-group">
            <label for="emailAddress">Email Address</label>
            <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="streetAddress">Street Address</label>
            <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="1234 Main St" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Portland" required>
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input id="state" class="form-control" type="text" name="state" placeholder="OR" required>
            </div>
            <div class="form-group col-md-2">
                <label for="zipCode">Zip</label>
                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="97213" required>
            </div>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="555-555-5555" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
