<?php

namespace Mobilozophy\MZCAPILaravel\Services\File;

use Mobilozophy\MZCAPILaravel\Services\Api\File\FileAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class FileService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\File
 */
class FileService extends ServiceBase
{
    /**
     * FileService constructor.
     * @param FileAPIService $fileAPIService
     */
    public function __construct(FileAPIService $fileAPIService)
    {
        $this->apiService = $fileAPIService;
    }

    /**
     * @param string $file Path to file
     * @param string $scopeable The name of the resource to scope the call to.
     * @param string $scopable_id The Id of the resource to scope the call to.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).*
     * @return bool|mixed
     */
    public function upload(
        $file,
        $scopeable,
        $scopable_id,
        $account_uuid = null,
        $scope = false,
        $fileType = 'primary'
    ) {
        $response = $this->apiService->uploadFile(
            $this->getSubAccountCredentials($account_uuid, $scope),
            $scopeable,
            $scopable_id,
            $file,
            $fileType
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
