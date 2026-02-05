<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register @vite directive for Laravel 8 compatibility
        Blade::directive('vite', function ($expression) {
            $assets = eval("return $expression;");
            $html = '';

            if (app()->environment('local')) {
                // Development mode - load from Vite dev server
                $html .= '<script type="module" src="http://localhost:5173/@vite/client"></script>';
                foreach ((array) $assets as $asset) {
                    if (str_ends_with($asset, '.css')) {
                        $html .= '<link rel="stylesheet" href="http://localhost:5173/' . $asset . '">';
                    } else {
                        $html .= '<script type="module" src="http://localhost:5173/' . $asset . '"></script>';
                    }
                }
            } else {
                // Production mode - load from manifest
                $manifestPath = public_path('build/manifest.json');
                if (file_exists($manifestPath)) {
                    $manifest = json_decode(file_get_contents($manifestPath), true);
                    foreach ((array) $assets as $asset) {
                        if (isset($manifest[$asset])) {
                            $entry = $manifest[$asset];
                            if (str_ends_with($asset, '.css')) {
                                $html .= '<link rel="stylesheet" href="/build/' . $entry['file'] . '">';
                            } else {
                                $html .= '<script type="module" src="/build/' . $entry['file'] . '"></script>';
                                if (isset($entry['css'])) {
                                    foreach ($entry['css'] as $css) {
                                        $html .= '<link rel="stylesheet" href="/build/' . $css . '">';
                                    }
                                }
                            }
                        }
                    }
                }
            }

            return $html;
        });
    }
}
