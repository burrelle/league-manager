<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = ["teamName", "league", "captain"];

    public function participants()
    {
        return $this->hasMany("App\Participant");
    }
}
