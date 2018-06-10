<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Lumen\Application;

class ExampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Example';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Application $app)
    {
      $this->info("run" . $this->description);
      $this->error("run" . $this->description);
      $this->alert("run" . $this->description);
    }
}
