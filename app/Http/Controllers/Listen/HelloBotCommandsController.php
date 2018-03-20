<?php

namespace App\Http\Controllers\Listen;

use App\Http\Controllers\Controller;

class HelloBotCommandsController extends Controller
{
    /**
     * Handle when user says "hello"
     * @param $bot
     */
    public function handleSayHello($bot)
    {
        $bot->reply("Hello, I'm Mood bot!");
    }

    /**
     * Handle when user says "hello, I'm {name}"
     * @param $bot
     * @param $name
     */
    public function handleSayHelloWithName($bot, $name)
    {
        $bot->reply("Hello, $name. I'm Mood bot");
    }
    public function hearsMoods($bot)
    {
        $bot->reply("Would you like to input your mood for today?");
    }

}