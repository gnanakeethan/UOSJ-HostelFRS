<?php
namespace App\Engine;

use Casperlaitw\LaravelFbMessenger\Contracts\BaseHandler;
use Casperlaitw\LaravelFbMessenger\Messages\Text;

/**
 * Created by PhpStorm.
 * User: gnanakeethan
 * Date: 24/12/2016
 * Time: PM 4:07
 */
class FacebookHandler extends BaseHandler
{

    /**
     * Handle the chatbot message
     *
     * @param \Casperlaitw\LaravelFbMessenger\Messages\ReceiveMessage $message
     *
     * @return mixed
     */
    public function handle(\Casperlaitw\LaravelFbMessenger\Messages\ReceiveMessage $message)
    {
        info($msg = $message->getMessage());
        $engine = new Engine();
        $engine->messageFrom('facebook')
            ->setSender($message->getSender())
            ->setMessage($message->getMessage())
            ->decodeAndProcess();
        $this->send(new Text($message->getSender(), $engine->getResult()));
    }

}