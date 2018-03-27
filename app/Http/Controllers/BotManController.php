<?php

namespace App\Http\Controllers;


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
            $bot->reply('Error');
        });


        $botman->listen();
    }


}
