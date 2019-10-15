<?php
/**
 * Created by PhpStorm.
 * User: dtulp
 * Date: 7-2-2018
 * Time: 13:36.
 */

namespace mayuriOAB\JsonApi\Server\Exceptions;

use Exception;
use mayuriOAB\JsonApi\Server\Constants\HttpCodes;
use mayuriOAB\JsonApi\Server\Traits\HandleResponses;

abstract class JsonException extends Exception
{
    use HandleResponses;
    protected $code = HttpCodes::HTTP_BAD_REQUEST;

    public function render()
    {
        return $this->respondWithBadRequest($this->message);
    }
}
