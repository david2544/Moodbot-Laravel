<?php

namespace App\Http\Controllers\Listen;

use App\Conversations\ExampleConversation;
use App\Conversations\MoodImputConversation;
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
    public function handleSayHello($bot)
    {
        $bot->reply("I am mood bot");
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
    //replace for now by function handleMood
    public function hearsMoods($bot)
    {
        $bot->reply("Would you like to input your mood for today?");

        $question = Question::create('How are you feeling today?')
            ->addButtons([
                Button::create('Happy :grin:')->value('5'),
                Button::create('Neutral :neutral_face:')->value('4'),
                Button::create('Sick :face_with_thermometer:')->value('3'),
                Button::create('Angry :angry:')->value('2'),
                Button::create('Sad :pensive:')->value('1'),
                Button::create('Unamused :unamused:')->value('3'),
            ]);


        $user = $bot->getUser();
        // Access ID
        $id = $user->getId();

        $bot->say($question, $id, SlackDriver::class);
    }

    public function handleMood($bot)
    {
        $bot->startConversation(new MoodImputConversation);
    }

}