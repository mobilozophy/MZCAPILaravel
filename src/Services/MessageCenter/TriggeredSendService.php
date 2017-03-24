<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class TriggeredSendService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $triggeredSendApiService;



    public function __construct(
        TriggeredSendAPIService $triggeredSendAPIService
    ) {
        $this->triggeredSendApiService = $triggeredSendAPIService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function send($id, $data)
    {

        $response =  $this->triggeredSendApiService->send(
            $this->getSubAccountCredentials(),$id, $data
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }

    }

}
