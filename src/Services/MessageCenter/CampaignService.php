<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CampaignAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class CampaignService extends ServiceBase
{


    public function __construct(
        CampaignAPIService $campaignAPIService
    ) {
        $this->apiService = $campaignAPIService;
    }



}
