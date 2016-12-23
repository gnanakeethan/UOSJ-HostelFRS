<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendTotalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'total:send {from?} {to?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send The Total To The Admin';

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
        //
    }
}
