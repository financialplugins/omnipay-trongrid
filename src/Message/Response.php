<?php

namespace Omnipay\Trongrid\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data)
            && isset($this->success)
            && $this->success == TRUE;
    }

    /**
     * Get error message
     *
     * @return string|null
     */
    public function getMessage()
    {
        return ($this->statusCode ?? 'UNKNOWN') . ' - ' . ($this->error ?? 'Unknown');
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data[0];
    }
}
