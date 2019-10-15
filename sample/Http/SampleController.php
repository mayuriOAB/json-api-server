<?php

namespace App\Http\Controllers\Api;

use App\Repositories\SampleRepository;
use Illuminate\Http\Request;
use mayuriOAB\JsonApi\Server\Http\Controllers\Api\BaseApiController;
use mayuriOAB\JsonApi\Server\Repositories\RepositoryInterface;

class SampleController extends BaseApiController
{
    /** @var RepositoryInterface $repository */
    protected $repository;

    public function __construct(SampleRepository $repository, Request $request)
    {
        $this->repository = $repository;
        parent::__construct($this->repository, $request);
    }
}
