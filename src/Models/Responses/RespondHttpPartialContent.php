<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpPartialContent extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_PARTIAL_CONTENT;
}
