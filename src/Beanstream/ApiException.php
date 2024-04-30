<?php

namespace Beanstream;


/**
 * ApiException class
 */
class ApiException extends Exception
{
    private $fullResponse;

    public function __construct($message, $code = 0, $fullResponse)
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
        if (!array_key_exists('3d_secure', $this->fullResponse)) {
            return null;
        }
        $threeDSecure = $this->fullResponse['3d_secure'];
        if (!array_key_exists('status', $threeDSecure)) {
            return null;
        }
        return $threeDSecure['status'];
    }
}