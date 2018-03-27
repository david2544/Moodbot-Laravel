<?php

namespace App\Console\Commands;

use App\Http\Controllers\Listen\HelloBotCommandsController;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Console\Command;
use \BotMan\Drivers\Slack\SlackDriver;
use App\Conversations\MoodInputConversation;
use App\Http\Controllers\Controller;
use BotMan\BotMan\Messages\Outgoing\Question;

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
    protected $signature = 'schedule:daemon';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Call the scheduler every day.';

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

        //$new = new HelloBotCommandsController();
        //$new->sendSlackMessage();

//        $botman = app('botman');
//        $botman->loadDriver('Slack');
//        $response = $botman->sendRequest('users.list');
//        $users = json_decode($response->getContent(), true);
//        $emails = collect($users['members'])->pluck('profile.email', 'id')->filter()->flip()->all();
//
//        //$botman->startConversation(new MoodInputConversation(), 'C9FHM6Q1X', SlackDriver::class);
//        //$botman->say($question, 'C9FHM6Q1X', SlackDriver::class);
//
//
//        foreach($emails as $key => $value)
//        {
//            $botman->startConversation(new MoodInputConversation(), $value, SlackDriver::class);
//
//        }




    }
}