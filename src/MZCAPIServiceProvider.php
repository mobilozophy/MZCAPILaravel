<?php

namespace Mobilozophy\MZCAPILaravel;

use Illuminate\Support\ServiceProvider;

class MZCAPIServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path'))
        {
            $this->publishes([
                __DIR__.'config/config.php' => config_path('mzcapi.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Account

        $this->app->bind('Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\DeviceAPIService', function () {
            return new DeviceAPIService($this->app['GuzzleHttp\Client']);
        });

        $this->app->bind('Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\SubscriptionAPIService', function () {
            return new SubscriptionAPIService($this->app['GuzzleHttp\Client']);
        });

        $this->app->bind('Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService', function () {
            return new TriggeredSendAPIService($this->app['GuzzleHttp\Client']);
        });

        $this->app->bind('Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService', function () {
            return new TriggeredSendProfileAPIService($this->app['GuzzleHttp\Client']);
        });

    }

    public function provides()
    {
        return [
            // Account
            'Mobilozophy\MZCAPILaravel\Service\Api\MZCAPI\Account\AccountAPI\Service',
            // Message Center
            'Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\DeviceAPIService',
            'Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\SubscriptionAPIService',
            'Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService',
            'Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService'
        ];
    }
}
