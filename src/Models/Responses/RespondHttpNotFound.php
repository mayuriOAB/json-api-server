<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpNotFound extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_NOT_FOUND;
    protected $message = 'Not Found';
}
