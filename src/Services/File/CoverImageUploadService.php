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

    public function upload($data, $resource_id, $scopable_type)
    {
        $this->fileService->upload($data, $scopable_type, $resource_id, false, null, 'cover');
    }
}
