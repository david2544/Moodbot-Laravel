<?php

namespace App\Console\Commands;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\Drivers\Slack\Extensions\Menu;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Conversations\ExampleConversation;
use \BotMan\Drivers\Slack\SlackDriver;
use \BotMan\BotMan\Messages\Outgoing\Question;

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

        $botman = app('botman');

        $question = Question::create('How are you feeling today?')
            ->addButtons([
                    Button::create('Happy :grin:')->value('5'),
                    Button::create('Neutral :neutral_face:')->value('4'),
                    Button::create('Sick :face_with_thermometer:')->value('3'),
                    Button::create('Angry :angry:')->value('2'),
                    Button::create('Sad :pensive:')->value('1'),
                    Button::create('Unamused :unamused:')->value('3'),
            ]);

        $botman->say($question, 'C9FHM6Q1X', SlackDriver::class);

    }
}