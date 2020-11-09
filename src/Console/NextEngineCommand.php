<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;

/**
 * Class NextEngineCommand
 * @package ShibuyaKosuke\LaravelNextEngine\Console
 */
class NextEngineCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nextengine:refresh-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh access token for NextEngine.';

    /**
     * @var Application
     */
    protected $app;

    /**
     * NextEngineCommand constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        parent::__construct();
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        // @todo
    }
}
