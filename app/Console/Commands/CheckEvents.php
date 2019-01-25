<?php

namespace App\Console\Commands;

use App\Model\Event\Event;
use APP\Http\Controllers\EventController;
use Illuminate\Console\Command;

class CheckEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:event {event}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the applicant of event';

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

    }
}
