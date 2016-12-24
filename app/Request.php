<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['room_id', 'user_id', 'queued_for', 'day_part'];
    //
}
