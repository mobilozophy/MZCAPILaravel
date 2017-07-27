# mzConnect API  Laravel

## Introduction

Work in progress 


## Installation

Edit your composer.json file to include the following:

```
"require":{
    ...
    "mobilozophy/MZCAPILaravel": "dev-master",
    ...
}

...

"repositories": [
    {
        "type": "git",
        "url": "https://bitbucket.org/mobilozophy/mzcapilaravel.git"
    }
]

```
Run `composer update`

Edit your `.env` file:
```
MZCAPI_BASEURL= enter base url provide by MZ
MZCAPI_USER= enter user provide by MZ
MZCAPI_PASS= enter pass provide by MZ
MZCAPI_ACCT= enter acct provide by MZ
MZCAPI_CODE= enter code provide by MZ
MZCAPI_KWD= enter kwd provide by MZ
```

Use Dependency injection to interact with API service.

## Example
```
<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Mobilozophy\MZCAPILaravel\Services\Store\StoreService;

class LocationController extends Controller
{
    protected $storeService;
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StoreService $storeService, Request $request)
    {
        $this->storeService = $storeService;
        $this->request = $request;

    }

   
    public function index()
    {
        try{
            $allLocationsForAccountJSON = $this->storeService->getall($mzAccountUUID);
            $allLocationsForAccount = $allLocationsForAccountJSON->data;


        } catch (ClientException $e) {
            //
        } catch (RequestException $e) {
            //
        } catch (\Exception $e) {
            //
        }

        ....
    }
    ...
```