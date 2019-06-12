<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CampaignAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class CampaignService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class CampaignService extends ServiceBase
{
    /**
     * CampaignService constructor.
     * @param CampaignAPIService $campaignAPIService
     */
    public function __construct(CampaignAPIService $campaignAPIService)
    {
        $this->apiService = $campaignAPIService;
    }
}
