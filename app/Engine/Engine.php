<?php
namespace App\Engine;

use App\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: gnanakeethan
 * Date: 24/12/2016
 * Time: PM 3:19
 */
class Engine
{
    protected $provider;
    protected $message;
    protected $sender;
    protected $result;
    protected $counter;

    public function __construct()
    {
        $this->counter = new Counter;
    }

    public function messageFrom($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;

    }

    public function decodeAndProcess()
    {
        $this->result = "";
        $user = User::where("{$this->provider}_id", '=', $this->sender)->first();
        if ($user)
            Auth::login($user);
        $msg = explode(" ", strtolower($this->message));
        info($msg);
        switch ($msg[0]) {
            case "count":
                $this->result = $this->counter->count(isset($msg[1]) ? $msg[1] : "", isset($msg[2]) ? $msg[2] : "");
                break;
            case "less":
                $this->result = $this->counter->subtract(isset($msg[1]) ? $msg[1] : "", isset($msg[2]) ? $msg[2] : "");
                break;
            case "add":
                $this->result = $this->counter->add(isset($msg[1]) ? $msg[1] : "", isset($msg[2]) ? $msg[2] : "");
                break;
            default:
                if ($msg[0])
                    $this->result = $this->counter->add(isset($msg[0]) ? $msg[0] : "");
                break;
        }

        return $this;

    }

    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    public function getResult()
    {
        return "Request Accepted.You told me {$this->message}.It resulted in {$this->result}.";
    }

}