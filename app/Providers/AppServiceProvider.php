<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Attempt to set DB time zone if DB is available. Wrap in try/catch so
        // a misconfigured DB (cached .env or wrong credentials) doesn't break
        // application bootstrap (useful during local development).
        try {
            DB::statement("SET time_zone = '+01:00'");
        } catch (\Exception $e) {
            // Log and continue booting — DB may be temporarily unavailable or
            // configuration may need to be reloaded (php artisan config:clear).
            report($e);
        }

        Blade::directive('active', function ($routes) {
            return "<?php
                \$active = '';
                foreach ($routes as \$route) {
                    if (Route::is(\$route)) {
                        \$active = 'side-menu--active';
                        break;
                    }
                }
                echo \$active;
            ?>";
        });

        Blade::directive('permissionLabel', function ($expression) {
            return "<?php
                if (strpos($expression, '.') !== false) {
                    [\$module, \$action] = explode('.', $expression);
                    \$actions = [
                        'view' => 'Voir',
                        'create' => 'Créer',
                        'edit' => 'Modifier',
                        'delete' => 'Supprimer',
                        'export' => 'Exporter',
                        'import' => 'Importer',
                        'manage' => 'Gérer',
                    ];
                    \$module = ucfirst(str_replace('_', ' ', \$module));
                    echo isset(\$actions[\$action])
                        ? \$actions[\$action] . ' ' . \$module
                        : ucfirst(\$module . ' ' . \$action);
                } else {
                    echo ucfirst($expression);
                }
            ?>";
        });
    }
}
