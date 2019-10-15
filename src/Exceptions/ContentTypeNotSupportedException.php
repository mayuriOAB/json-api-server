<?php

namespace mayuriOAB\JsonApi\Server\Exceptions;

use mayuriOAB\JsonApi\Server\Constants\HttpCodes;

class ContentTypeNotSupportedException extends JsonException
{
    protected $code = HttpCodes::HTTP_UNSUPPORTED_MEDIA_TYPE;
}
