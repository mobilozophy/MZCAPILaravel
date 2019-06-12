<?php

namespace Mobilozophy\MZCAPILaravel\Services;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

/**
 * Trait UsesCredentialsTrait
 * @package Mobilozophy\MZCAPILaravel\Services
 */
trait UsesCredentialsTrait
{
    private $credentials;

    /**
     * @param Credentials $credentials
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return mixed
     */
    protected function getCredentials()
    {
        if (!$this->credentials) {
            throw new MissingCredentialsException();
        }

        return $this->credentials;
    }
}
