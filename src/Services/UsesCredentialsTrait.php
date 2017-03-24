<?php

namespace Mobilozophy\MZCAPILaravel\Services;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

trait UsesCredentialsTrait
{
    private $credentials;
    
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }
    
    protected function getCredentials()
    {
        if ( ! $this->credentials) {
            throw new MissingCredentialsException;
        }
        
        return $this->credentials;
    }
}