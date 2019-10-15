<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

abstract class RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
