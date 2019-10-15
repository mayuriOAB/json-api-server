<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpUnauthorized extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_UNAUTHORIZED;
    protected $message = 'Unauthorized';
}
