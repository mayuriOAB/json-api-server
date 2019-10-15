<?php

namespace mayuriOAB\JsonApi\Server\Models\Responses;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class RespondHttpForbidden extends RespondError
{
    protected $statusCode = HttpCodes::HTTP_FORBIDDEN;
    protected $message = 'Forbidden';
}
