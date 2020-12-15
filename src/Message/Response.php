<?php

namespace Omnipay\Trongrid\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data->data)
            && isset($this->data->success)
            && $this->data->success == TRUE;
    }

    /**
     * Get error message
     *
     * @return string|null
     */
    public function getMessage()
    {
        return ($this->data->statusCode ?? 'UNKNOWN') . ' - ' . ($this->data->error ?? 'Unknown');
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return isset($this->data->data) && isset($this->data->data[0]) && isset($this->data->data[0]->balance)
            ? $this->data->data[0]->balance
            : 0;
    }
}
