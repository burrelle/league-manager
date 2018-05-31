<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'emailAddress', 'streetAddress',
        'city', 'state', 'zipCode', 'phoneNumber', 'team_id'
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
