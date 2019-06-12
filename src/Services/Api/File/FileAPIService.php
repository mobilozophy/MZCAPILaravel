<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\File;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class FileAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'files';

    /**
     * Upload a File
     * @param Credentials $credentials
     * @param             $scope
     * @param             $scope_id
     * @param             $file
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function uploadFile(
        Credentials $credentials,
        $scope,
        $scope_id,
        $file
    ) {
        $requestUrl =
            $this->getEndpointRequestUrl() . '/' . $scope . '/' . $scope_id;

        $image_path = $file->getPathname();
        $image_mime = $file->getmimeType();
        $image_org = $file->getClientOriginalName();

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => $image_org,
                    'Mime-Type' => $image_mime,
                    'contents' => fopen($image_path, 'r')
                ]
            ]
        ]);
    }
}
