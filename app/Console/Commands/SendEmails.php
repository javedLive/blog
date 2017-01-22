<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail; 

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
       
            $user=User::all();
            Mail::queue('send', ['user' => $user], function($m) use ($user)
                {
                    foreach ($user as $user) {
                         $m->to($user->email)->subject('Email Confirmation');
                     }                     
                });       
    }
}
