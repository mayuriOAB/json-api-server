<?php

namespace Tests\TestClasses;

use mayuriOAB\JsonApi\Server\Repositories\BaseApiRepository;

class TestRepository extends BaseApiRepository
{
    protected $modelName = TestModel::class;

    public function getModelName(): string
    {
        return $this->modelName;
    }

    public function replaceModel($model)
    {
        $this->modelName = $model;
    }

    public function getQuery()
    {
        return $this->query->getQuery();
    }

    public function getColumns()
    {
        return $this->columns;
    }
}
