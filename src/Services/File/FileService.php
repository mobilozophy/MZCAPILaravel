<?php

namespace Mobilozophy\MZCAPILaravel\Services\File;

use Mobilozophy\MZCAPILaravel\Services\Api\File\FileAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class FileService extends ServiceBase
{

    public function __construct( FileAPIService $fileAPIService) {
        $this->apiService = $fileAPIService;
    }

    /**
     * Add - POST
     * @param array $data
     * @param null  $account_uuid
     *
     * @return bool|mixed
     */
    public function upload($file, $scopeable, $scopable_id, $account_uuid = null, $scope = false)
    {
        $response = $this->apiService->uploadFile(
            $this->getSubAccountCredentials($account_uuid,$scope), $scopeable,$scopable_id,$file
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }
}
