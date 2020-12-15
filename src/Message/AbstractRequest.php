<?php

namespace Omnipay\Trongrid\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    protected $endpoints = [
        'trongrid' => 'https://api.trongrid.io/v1',
        'shasta' => 'https://api.shasta.trongrid.io/v1'
    ];

    protected $responseClass = Response::class;

    abstract protected function validateRequest(): void;

    public function getEndpoint(): string
    {
        return $this->endpoints[$this->getNetwork()] ?? NULL;
    }

    public function getNetwork(): string
    {
        return $this->getParameter('network');
    }

    public function setNetwork(string $value)
    {
        return $this->setParameter('network', $value);
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request('GET', $this->getEndpoint() . $data);

        return $this->createResponse(json_decode($httpResponse->getBody()->getContents()));
    }

    protected function createResponse($data): Response
    {
        return $this->response = new $this->responseClass($this, $data);
    }
}
