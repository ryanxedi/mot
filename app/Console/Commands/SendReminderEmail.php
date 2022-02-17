<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ReminderEmail;
use App\Models\Reminder;
use Carbon\Carbon;
use Mail;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send MOT reminder emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminders = Reminder::where('expires', Carbon::now()->subMonth(1))->get();

        foreach ($reminders as $reminder) {
            Mail::to($reminder->email)
                ->send(new ReminderEmail($reminder->email, $reminder->registration));

            $reminder->update([
                'last_sent' => Carbon::now()
            ]);
        }
    }
}
