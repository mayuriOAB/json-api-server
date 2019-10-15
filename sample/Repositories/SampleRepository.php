<?php

namespace App\Repositories;

use App\Sample;
use mayuriOAB\JsonApi\Server\Repositories\BaseApiRepository;

class SampleRepository extends BaseApiRepository
{
    public function getModelName(): string
    {
        return Sample::class;
    }
}
