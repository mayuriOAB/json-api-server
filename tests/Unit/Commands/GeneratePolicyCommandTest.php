<?php
/**
 * Created by PhpStorm.
 * User: dtulp
 * Date: 6-2-2018
 * Time: 12:10.
 */

namespace mayuriOAB\JsonApi\Server\Console\Commands;

use Tests\CommandTestCase;

class GeneratePolicyCommandTest extends CommandTestCase
{
    /** @test */
    public function it_generates_a_policy()
    {
        $this->artisan('json-api-server:generate-policy', ['name' => 'Example', '--path' => 'tests/Data/Output/']);
        $this->assertTrue(file_exists(config('laravel_api.path.policy').'ExamplePolicy.php'));
        unlink('tests/Data/Output/'.'ExamplePolicy.php');
    }
}
