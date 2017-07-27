<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\MessageTemplateAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class MessageTemplateService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class MessageTemplateService extends ServiceBase
{

    /**
     * MessageTemplateService constructor.
     * @param MessageTemplateAPIService $messageTemplateAPIService
     */
    public function __construct(
        MessageTemplateAPIService $messageTemplateAPIService
    ) {
        $this->apiService = $messageTemplateAPIService;
    }


}
