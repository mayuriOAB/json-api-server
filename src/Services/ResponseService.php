<?php

namespace mayuriOAB\JsonApi\Server\Services;

use mayuriOAB\JsonApi\Server\Exceptions\NotFoundException;
use mayuriOAB\JsonApi\Server\Http\Resources\BaseApiCollectionResource;
use mayuriOAB\JsonApi\Server\Http\Resources\BaseApiResource;
use mayuriOAB\JsonApi\Server\Models\Responses\RespondError;

class ResponseService
{
    public function response($strResponseModel, $content = null)
    {
        $responseModel = new $strResponseModel();

        return $this->createResponse($responseModel, $content);
    }

    protected function createResponse($responseModel, $content)
    {
        if ($responseModel instanceof RespondError) {
            $errors = $this->formatErrors($responseModel, $content);

            return response()->json($errors, $responseModel->getStatusCode(), ['Content-Type' => 'application/vnd.api+json'], JSON_UNESCAPED_SLASHES);
        }

        return response()->json($content, $responseModel->getStatusCode(), ['Content-Type' => 'application/vnd.api+json'], JSON_UNESCAPED_SLASHES);
    }

    public function respondWithResourceCollection($strResponseModel, $content)
    {
        $responseModel = new $strResponseModel();

        return (new BaseApiCollectionResource($content))
            ->response()
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/vnd.api+json')
            ->setStatusCode($responseModel->getStatusCode());
    }

    public function responseWithResource($strResponseModel, $content)
    {
        if (!$content) {
            throw new NotFoundException('Not found');
        }
        $responseModel = new $strResponseModel();

        return (new BaseApiResource($content))
            ->response()
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/vnd.api+json')
            ->setStatusCode($responseModel->getStatusCode());
    }

    /**
     * @param $responseModel
     * @param $content
     *
     * @return mixed
     */
    protected function formatErrors($responseModel, $content)
    {
        $errors['errors'] = [
            0 => [
                'status' => (string) $responseModel->getStatusCode(),
                'title' => (string) $responseModel->getMessage(),
                'detail' => (string) $content,
            ],
        ];

        return $errors;
    }
}
