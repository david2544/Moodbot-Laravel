<?php

namespace App\Console\Commands;

use BotMan\BotMan\BotMan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Conversations\ExampleConversation;


/* As filename states, this is a COMMAND! There is no view for this file!
   The Command to be used to activate the function below is php artisan schedule:daemon
   It is run by Heroku Scheduler https://scheduler.heroku.com/dashboard
*/

class SendSlackMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:daemon {--sleep=120 }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call the scheduler every day.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    /*Takes the payload from the payload variable and sends it to slack via the url specified in the url variable
    as an incoming webhook
    */

    public function handle()
    {

        /* Incoming webhook URL - Payload is sent to URL that is provided by Slack and then Slack API
           transforms the payload to Slack message
        */
        $botman = app('botman');

        //$botman->say("Would you like to input your mood for today?");

        $botman->say('help', 'C9FHM6Q1X', SlackDriver::class);

        //$botman->listen();
//        $url = 'https://hooks.slack.com/services/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';
//
//        //prepares the message to be sent to slack via incoming webhooks as JSON
//        $payload = '{
//            "text": "Hey! Would you like to introduce your input for today?",
//            "attachments": [
//                {
//                    "text": "Please choose one of the moods displayed below",
//                    "fallback": "You are unable to choose a game",
//                    "callback_id": "wopr_game",
//                    "color": "#3AA3E3",
//                    "attachment_type": "default",
//                    "actions": [
//                        {
//                            "name": "mood",
//                            "text": "Happy :grin:",
//                            "type": "button",
//                            "value": "5"
//                        },
//                        {
//                            "name": "mood",
//                            "text": "Angry :angry:",
//                            "type": "button",
//                            "value": "1.5",
//                        },
//                        {
//                            "name": "mood",
//                            "text": "Neutral :neutral_face:",
//                            "type": "button",
//                            "value": "2.5"
//                        },
//                        {
//                            "name": "mood",
//                            "text": "Sick :face_with_head_bandage:",
//                            "type": "button",
//                            "value": "2"
//                        },
//                        {
//                            "name": "mood",
//                            "text": "Sad :pensive:",
//                            "style": "danger",
//                            "type": "button",
//                            "value": "1",
//                            "confirm": {
//                                "title": "We are sad to hear that.",
//                                "text": "Would you like to tell me why?",
//                                "ok_text": "Yes sure",
//                                "dismiss_text": "No"
//                            }
//                        }
//                    ]
//                }
//            ]
//        }';
//
//        // curl actually sends payload to URL (otherwise function wouln't know what and where to send it)
//
//        $ch = curl_init( $url );
//        curl_setopt( $ch, CURLOPT_POST, 1);
//        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
//        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
//        curl_setopt( $ch, CURLOPT_HEADER, 0);
//        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
//
//        $response = curl_exec( $ch );


    }
}