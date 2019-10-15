<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpCreated extends RespondSuccess
{
    protected $statusCode = HttpCodes::HTTP_CREATED;
}
