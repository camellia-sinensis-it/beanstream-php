<?php

namespace Beanstream;


/**
 * ApiException class
 */
class ApiException extends Exception
{
    private $fullResponse;

    public function __construct($message, $code = 0, $fullResponse = null)
    {
        parent::__construct($message, $code);
        $this->fullResponse = $fullResponse;
    }

    public function getFullResponse()
    {
        return $this->fullResponse;
    }

    public function get3DSecureStatus(): ?string
    {
        if (!is_array($this->fullResponse)) {
            return null;
        }

        $threeDSecure = $this->fullResponse['3d_secure'] ?? null;
        if (!is_array($threeDSecure)) {
            return null;
        }

        return $threeDSecure['status'] ?? null;
    }
}
