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

    public function upload($data, $model)
    {
        $scopable_type = get_class($model);
        $resource_id = $model->id;

        $this->fileService->upload($data, $scopable_type, $resource_id, false, null, 'cover');
    }
}
