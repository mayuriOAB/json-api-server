<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpNoContent extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_NO_CONTENT;
}
