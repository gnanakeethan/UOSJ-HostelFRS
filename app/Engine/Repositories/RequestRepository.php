<?php
namespace App\Engine\Repositories;

use App\Request;

/**
 * Created by PhpStorm.
 * User: gnanakeethan
 * Date: 26/12/2016
 * Time: AM 7:51
 */
class RequestRepository
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getFormattedList($date, $part, $ADMIN = FALSE)
    {
        if ($ADMIN) {
            $requests = $this->request
                ->with(['room', 'user'])
                ->where('count','>','0')
                ->where('queued_for', '=', $date)
                ->where('day_part', '=', $part)->get();
        } else {
            $requests = $this->request
                ->with(['room', 'user'])
                ->where('room_id', auth()->user()->room->id)
                ->where('count','>','0')
                ->where('queued_for', '=', $date)
                ->where('day_part', '=', $part)
                ->get();
        }
        $list = "";
        info($requests);
        foreach ($requests as $request) {
            $list .= "Room Name: {$request->room->name}. {$request->count} Packet(s) For {$request->user->name} " . "\n";
        }
        if (!$list)
            $list = "No Records";

        return "$list";
    }
}