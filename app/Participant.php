<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
