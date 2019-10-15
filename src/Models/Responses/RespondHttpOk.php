<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpOk extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_OK;
}
