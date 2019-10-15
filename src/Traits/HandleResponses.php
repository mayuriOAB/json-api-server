<?php

namespace mayuriOAB\JsonApi\Server\Traits;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondError;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpCreated;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpForbidden;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpNoContent;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpNotFound;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpOk;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondHttpPartialContent;
use mayuriOAB\JsonApi\Server\Services\ResponseService;

trait HandleResponses
{
    protected function respond($respondModel, $content)
    {
        $service = new ResponseService();

        return $service->response($respondModel, $content);
    }

    protected function respondWithResource($respondModel, $content)
    {
        $service = new ResponseService();

        return $service->responseWithResource($respondModel, $content);
    }

    protected function respondWithResourceCollection($respondModel, $content)
    {
        $service = new ResponseService();

        return $service->respondWithResourceCollection($respondModel, $content);
    }

    public function respondWithOK($content)
    {
        return $this->respondWithResource(RespondHttpOk::class, $content);
    }

    public function respondWithPartialContent($content)
    {
        return $this->respondWithResourceCollection(RespondHttpPartialContent::class, $content);
    }

    protected function respondWithCollectionOK($content)
    {
        return $this->respondWithResourceCollection(RespondHttpOk::class, $content);
    }

    public function respondWithCreated($content)
    {
        return $this->respondWithResource(RespondHttpCreated::class, $content);
    }

    public function respondWithNoContent()
    {
        return $this->respond(RespondHttpNoContent::class, '');
    }

    public function respondWithCollection($content)
    {
        if ($content instanceof Paginator) {
            return $this->respondWithPartialContent($content);
        }

        if ($content instanceof Model) {
            return $this->respondWithOK($content);
        }

        return $this->respondWithCollectionOK($content);
    }

    public function respondWithForbidden($content)
    {
        return $this->respond(RespondHttpForbidden::class, $content);
    }

    public function respondWithBadRequest($content)
    {
        return $this->respond(RespondError::class, $content);
    }

    public function respondWithNotFound($content)
    {
        return $this->respond(RespondHttpNotFound::class, $content);
    }
}
