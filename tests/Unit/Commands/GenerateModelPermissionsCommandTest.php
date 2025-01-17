<?php
/**
 * Created by PhpStorm.
 * User: dtulp
 * Date: 6-2-2018
 * Time: 13:29.
 */

namespace mayuriOAB\JsonApi\Server\Console\Commands;

use Tests\CommandTestCase;

class GenerateModelPermissionsCommandTest extends CommandTestCase
{
    /** @test */
    public function it_generates_a_model_permissions()
    {
        $this->artisan('json-api-server:generate-model-permissions', ['name' => 'Example', '--path' => 'tests/Data/Output/']);
        $this->assertTrue(file_exists(config('laravel_api.path.model_permissions').'ExamplePermissions.php'));
        unlink('tests/Data/Output/'.'ExamplePermissions.php');
    }
}
