<?php

namespace Mobilozophy\MZCAPILaravel\Services\File;

use Mobilozophy\MZCAPILaravel\Services\File\FileService;

class CoverImageUploadService
{
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function upload($data, $resourceId, $scopable_type, $accountId)
    {
        $this->fileService->upload($data, $scopable_type, $resourceId, $accountId, false, 'cover');
    }
}
