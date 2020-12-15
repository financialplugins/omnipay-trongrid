<?php

namespace Omnipay\Trongrid\Message;

class FetchBalanceRequest extends AbstractRequest
{
    protected function validateRequest(): void
    {
        $this->validate(
            'address'
        );
    }

    protected function getData(): string
    {
        return 'address/' . $this->getAddress();
    }

    public function getAddress()
    {
        return $this->getParameter('address');
    }

    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }
}
