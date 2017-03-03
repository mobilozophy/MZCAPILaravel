<?php

namespace Mobilozophy\MZCAPILaravel\Providers\MessageCenter;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService;
use Illuminate\Support\ServiceProvider;

class TriggeredSendProfileAPIServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService', function () {
            return new TriggeredSendProfileAPIService($this->app['GuzzleHttp\Client']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService'];
    }
}
