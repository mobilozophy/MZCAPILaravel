<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Illuminate\Support\Facades\Log;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\FirebaseCloudAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class FirebaseCloudService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Reporting
 */

class FirebaseCloudService extends ServiceBase
{
    public $fireBaseApiSvc;

    public function __construct(FirebaseCloudAPIService $firebase)
    {
        $this->fireBaseApiSvc = $firebase;
    }

    public function createNewNotification($data, $account_uuid, $scope = false, $otherHeaders=[])
    {
        try
        {
            $response = $this->fireBaseApiSvc->makePostCall(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders), $data, 'new'
            );

            if ($response->getStatusCode() == 200)
            {
                Log::info($response);
                return json_decode($response->getBody()->getContents(), true);
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            return false;
        }
    }
}