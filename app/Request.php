<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['room_id', 'user_id', 'queued_for', 'day_part'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getList()
    {
        return $this->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
