<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MoodImputConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {


        $this->ask('Would you like to introduce your mood input for today?', function (Answer $response) {

            $question = Question::create('How are you feeling today?')
                ->fallback('Unable to ask question')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create('Happy :grin:')->value('5'),
                    Button::create('Neutral :neutral_face:')->value('4'),
                    Button::create('Sick :face_with_thermometer:')->value('3'),
                    Button::create('Angry :angry:')->value('2'),
                    Button::create('Sad :pensive:')->value('1'),
                    Button::create('Unamused :unamused:')->value('3'),
                ]);

            if ($response->getText() === 'yes' || 'sure' || 'okay' || 'ok' || 'yup' || 'of course' || 'alright' || 'ja' || 'ya') {
                $this->ask($question, function (Answer $answer) {
                    if ($answer->isInteractiveMessageReply()) {
                        if ($answer->getValue() === '5') {
                            $this->say("Wohoo. It's good to hear that you are happy");
                        }
                        if ($answer->getValue() === '4') {
                            $this->say("I am sure we can cheer you up a bit. Have a random Chuck Norris joke");
                            $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                            $this->say($joke->value->joke);
                        }
                        if ($answer->getValue() === '3') {
                            $this->say("Oh noo. We hope that you will get well soon! :worried:");
                        }
                        if ($answer->getValue() === '2') {
                            $this->say("Thank you for your input. Try to breathe deeply a few times, I'm sure you will feel better");
                        }
                        if ($answer->getValue() === '1') {
                            $this->say("We are sad to hear that. Would you like to talk about it?");
                        }
                    }
                });
            } else {
                $this->say('Ahh, okay. We can try tomorrow then. Have a nice day!');
            }
        });

//            ->addButtons([
//                Button::create('Tell a joke')->value('joke'),
//                Button::create('Give me a fancy quote')->value('quote'),
//            ]);
//
//        return $this->ask($question, function (Answer $answer) {
//            if ($answer->isInteractiveMessageReply()) {
//                if ($answer->getValue() === 'joke') {
//                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
//                    $this->say($joke->value->joke);
//                } else {
//                    $this->say(Inspiring::quote());
//                }
//            }
//        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
