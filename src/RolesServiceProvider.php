<?php

namespace Tonacastelan\Roles;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutes();
        $this->publishMigrations();
        $this->loadMigrations();
        $this->registerBladeDirectives();
        $this->loadViews();
        $this->publishViews();
    }

    /**
     * Load the views.
     * 
     * @return void
     */
    public function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'roles');
    }

    /**
     * Publish the views.
     * 
     * @return void
     */
    public function publishViews()
    {
        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/tonacastelan/roles'),
        ]);
    }

    /**
     * Load the routes.
     * 
     * @return void
     */
    public function loadRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
    }

    /**
     * Publish the migration files.
     * 
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__ . '/../migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Load our migration files.
     * 
     * @return void
     */
    protected function loadMigrations()
    {
        if (true) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        }
    }

    /**
     * Register the blade directives.
     *
     * @return void
     */
    protected function registerBladeDirectives()
    {
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) : ?>";
        });
        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });
    }
}
