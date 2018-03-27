<?php

namespace App\Http\Controllers\Listen;

use App\Conversations\MoodInputConversation;
use App\Http\Controllers\Controller;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Slack\SlackDriver;

class HelloBotCommandsController extends Controller
{
    /**
     * Handle when user says "hello"
     * @param $bot
     */

    /**
     * Handle when user says "hello, I'm {name}"
     * @param $bot
     * @param $name
     */
    public function handleSayHelloWithName($bot, $name)
    {
        $bot->reply("Hello, $name. I'm Mood bot");
    }
    

    public static function handleMood($bot)
    {
        $bot->startConversation(new MoodInputConversation);
    }

}