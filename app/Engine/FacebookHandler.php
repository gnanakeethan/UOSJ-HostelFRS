<?php
namespace App\Engine;
use Casperlaitw\LaravelFbMessenger\Contracts\BaseHandler;

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
        // TODO: Implement handle() method.
    }
}