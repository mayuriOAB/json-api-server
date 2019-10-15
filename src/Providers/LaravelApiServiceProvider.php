<?php

namespace Swis\JsonApi\Server\Providers;

use Dimsav\Translatable\TranslatableServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateAllCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateApiControllerCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateAuthenticationTestCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateModelCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateModelPermissionsCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateModelTranslationCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GeneratePolicyCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateRepositoryCommand;
use mayuriOAB\JsonApi\Server\Console\Commands\GenerateRoutesCommand;
use mayuriOAB\JsonApi\Server\Http\Middleware\ConfigureLocale;
use mayuriOAB\JsonApi\Server\Http\Middleware\InspectContentType;
use Symfony\Component\Finder\Finder;

class LaravelApiServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->aliasMiddleware('configure_locale', ConfigureLocale::class);
        $router->aliasMiddleware('inspect_content_type', InspectContentType::class);

        $this->publishes([
            __DIR__.'/../../config/laravel_api.php' => base_path('config/laravel_api.php'),
        ], 'laravel-api');

        $this->publishes([
            __DIR__.'/../../resources/templates' => base_path('resources/templates'),
        ], 'laravel-api-templates');
        $this->mapJsonApiRoutes();
    }

    public function register()
    {
        $this->app->register(TranslatableServiceProvider::class);

        $this->commands([
            GenerateAllCommand::class,
            GenerateApiControllerCommand::class,
            GenerateModelCommand::class,
            GenerateModelTranslationCommand::class,
            GeneratePolicyCommand::class,
            GenerateRepositoryCommand::class,
            GenerateModelPermissionsCommand::class,
            GenerateAuthenticationTestCommand::class,
            GenerateRoutesCommand::class,
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../../config/laravel_api.php',
            'laravel_api'
        );
    }

    protected function mapJsonApiRoutes()
    {
        if (!File::exists(config('laravel_api.path.routes'))) {
            return;
        }
        $files = Finder::create()->files()->in(config('laravel_api.path.routes'));
        foreach ($files as $file) {
            Route::middleware('inspect_content_type')->group($file->getRealPath());
        }
    }
}
