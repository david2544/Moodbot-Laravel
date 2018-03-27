<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use BotMan\Drivers\Slack\SlackDriver;
use App\Conversations\MoodInputConversation;

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
    protected $description = 'Call the scheduler every day.';

    /**
     * Execute the console command.
     * Was mixed now void
     *
     * @return void
     */

    public function handle()
    {

        $botman = app('botman');
        $botman->loadDriver('Slack');
        $response = $botman->sendRequest('users.list');
        $users = json_decode($response->getContent(), true);
        $userID = collect($users['members'])->pluck('profile.email', 'id')->filter()->flip()->all();

        foreach($userID as $key => $value)
        {
            $botman->startConversation(new MoodInputConversation(), $value, SlackDriver::class);

        }

        //my id U9G1JEG03 || general channel U9G1JEG03




    }
}