<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
#use BotMan\BotMan\DriverManager;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Slack\SlackDriver;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */



    public function handle()
    {

        $botman = app('botman');

        $botman->hears("hello I'm {name}", 'App\Http\Controllers\Listen\HelloBotCommandsController@handleSayHelloWithName');
        $botman->hears('mood', 'App\Http\Controllers\Listen\HelloBotCommandsController@handleMood');
        $botman->fallback(function($bot) {
            $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
        });

        $botman->listen();
    }


    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
}
