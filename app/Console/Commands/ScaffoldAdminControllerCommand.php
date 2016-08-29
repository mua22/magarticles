<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ScaffoldAdminControllerCommand extends Command
{
    protected $composer;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold:controller {model : The model Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It does Nothing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->composer = app()['composer'];
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment($this->description);
    }
}
