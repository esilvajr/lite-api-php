<?php

namespace Arquivei\LiteApi\Sdk\Responses\Http;

class Status
{
    private /** int */ $code;
    private /** string */ $message;

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode($code): Status
    {
        $this->code = $code;
        return $this;
    }
    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): Status
    {
        $this->message = $message;
        return $this;
    }
}