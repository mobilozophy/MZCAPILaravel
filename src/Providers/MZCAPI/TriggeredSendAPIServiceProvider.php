<?php

namespace Mobilozophy\MZCAPILaravel\Providers\MessageCenter;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService;
use Illuminate\Support\ServiceProvider;

class TriggeredSendAPIServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService', function () {
            return new TriggeredSendAPIService($this->app['GuzzleHttp\Client']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService'];
    }
}
