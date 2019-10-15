<?php

namespace mayuriOAB\JsonApi\Server\Console\Commands;

class GenerateModelPermissionsCommand extends BaseGenerateCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json-api-server:generate-model-permissions {name} {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a config for the model\'s permissions.';

    protected $name;

    protected $overridePath;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->name = $this->argument('name');
        $this->overridePath = $this->option('path');
        $this->overridePath();
        $this->generateClass('Permissions', 'model_permissions');
    }

    public function getModelName()
    {
        return $this->name;
    }

    public function getOverridePath()
    {
        return $this->overridePath;
    }

    public function getConfigPath()
    {
        return 'laravel_api.path.model_permissions';
    }
}
