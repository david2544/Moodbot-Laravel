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

    public function sendSlackMessage()
    {

        $botman = app('botman');
        $botman->loadDriver('Slack');
        $response = $botman->sendRequest('users.list');
        $users = json_decode($response->getContent(), true);
        $emails = collect($users['members'])->pluck('profile.email', 'id')->filter()->flip()->all();

        //$botman->startConversation(new MoodInputConversation(), 'C9FHM6Q1X', SlackDriver::class);
        //$botman->say($question, 'C9FHM6Q1X', SlackDriver::class);


        foreach($emails as $key => $value)
        {
            $botman->startConversation(new MoodInputConversation(), $value, SlackDriver::class);

        }


    }


    public function handleMood($bot)
    {
        $botman = app('botman');
        $botman->loadDriver('Slack');
        $response = $botman->sendRequest('users.list');
        $users = json_decode($response->getContent(), true);
        $emails = collect($users['members'])->pluck('profile.email', 'id')->filter()->flip()->all();

        //$botman->startConversation(new MoodInputConversation(), 'C9FHM6Q1X', SlackDriver::class);
        //$botman->say($question, 'C9FHM6Q1X', SlackDriver::class);


        foreach($emails as $key => $value)
        {
            $bot->startConversation(new MoodInputConversation(), $value, SlackDriver::class);

        }

        //$bot->startConversation(new MoodInputConversation);
    }

}