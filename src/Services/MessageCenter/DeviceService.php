<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\DeviceAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class DeviceService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $deviceApiService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\DeviceAPIService $keywordApiService
     */
    public function __construct(
        DeviceAPIService $deviceApiService
    ) {
        $this->deviceApiService = $deviceApiService;
    }

    /**
     * Add a keyword.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        $response = $this->deviceApiService->add(
            $this->getSubAccountCredentials(), $data
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }



    /**
     * Get keyword.
     *
     * @param integer $keywordId
     */
    public function get($id)
    {
        try {
            $response = $this->deviceApiService->get(
                $this->getSubAccountCredentials(), $id
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }

    /**
     * Get keywords.
     */
    public function getall()
    {
        $response = $this->deviceApiService->getAll(
            $this->getSubAccountCredentials()
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    public function delete($id)
    {
        $response = $this->deviceApiService->delete(
            $this->getSubAccountCredentials(), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

}
