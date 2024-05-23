<?php

namespace Fadgram\LaravelBootstrap5Components\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
class FadgramServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/fadgram-bootstrap5-components.php' => config_path('fadgram-bootstrap5-components.php'), // Config file (optional)
            __DIR__.'/../../resources/views' => resource_path('views/vendor/fadgram/laravel-bootstrap5-components'), // Views (optional)
        ], 'fadgram-laravel-bootstrap5-components'); // Tag for publishing

        // Register Blade components (if applicable)
        if (! app()->runningInConsole()) {
            $this->registerComponents();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Optionally register services or facades here
    }

    protected function registerComponents()
    {
        Blade::directive('pre', function ($expression) {
            return "<?php echo '<pre>' . print_r($expression, true) . '</pre>'; ?>";
        });

        Blade::directive('content', function ($expression = null) {
            return "<?php content($expression);?>";
        });
        // Register your Blade components here (example)
        //Blade::component('my-component', MyComponent::class);
    }
}
