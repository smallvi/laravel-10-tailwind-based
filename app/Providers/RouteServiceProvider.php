<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {

            $subdomain_mode = env('SUBDOMAIN_MODE', FALSE);
            $config_domains = config('domain.route');

            foreach ($config_domains as $middleware => $config) {
                [
                    'domain' => $domain,
                    'file' => $file,
                    'name' => $name,
                    'prefix' => $prefix,
                    'namespace' => $namespace,
                ] = $config;

                $route = Route::middleware($middleware);

                if (!empty($namespace)) {
                    $route->namespace("App\\Http\\Controllers\\" . $namespace);
                } else {
                    $route->namespace("App\\Http\\Controllers");
                }

                if (!empty($name)) {
                    $route->name($name);
                }

                if ($subdomain_mode) {
                    $route->domain($domain);
                } else {
                    $route->prefix($prefix);
                }

                $route->group($file);
            }

            // Route::middleware('api')
            //     ->prefix('api')
            //     ->group(base_path('routes/api.php'));

            // Route::middleware('admin')
            //     ->prefix('admin')
            //     ->group(base_path('routes/admin.php'));

            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));

            // Route::middleware('admin')
            //     ->domain('admin.laravel-10-tailwind-based.test')
            //     // ->prefix('admin')
            //     ->group(base_path('routes/admin.php'));

        });
    }
}
