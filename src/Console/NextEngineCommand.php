<?php

declare(strict_types=1);

namespace ShibuyaKosuke\LaravelNextEngine\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use ShibuyaKosuke\LaravelNextEngine\Facades\NextEngine;
use ShibuyaKosuke\LaravelNextEngine\Models\NextEngineApi;

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
        \Log::info('TOKEN REFRESH BATCH');
        $this->info('======== START TOKEN REFRESH ========');

        /** @var NextEngineApi[]|Collection $nextEngineApis */
        $nextEngineApis = NextEngineApi::refresh()->get();

        if ($nextEngineApis->count() === 0) {
            $this->info('=   No Account is need to update.   =');
            $this->info('========  END TOKEN REFRESH  ========');
            return;
        }

        $accounts = $nextEngineApis->filter(
            function (NextEngineApi $nextEngineApi) {

                $nextEngine = NextEngine::setAccount($nextEngineApi);

                $response = $nextEngine->loginForCli($nextEngineApi->redirect_uri);

                if (!is_array($response)) {
                    return false;
                }

                /** @var string $content */
                $content = $nextEngine->loginUser();

                $this->info(sprintf('更新: ID %d', $nextEngineApi->id));

                return true;
            }
        );

        $this->info(
            sprintf('========  %d / %d Success!  ========', $accounts->count(), $nextEngineApis->count())
        );

        \Log::info(sprintf('Success: %d / %d', $accounts->count(), $nextEngineApis->count()));
        $this->info('========  END TOKEN REFRESH  ========');
    }
}
