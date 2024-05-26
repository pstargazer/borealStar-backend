<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Spot;
use App\Policies\SpotPolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Spot::class => SpotPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::guessPolicyNamesUsing(function (string $modelClass) {
            // Return the name of the policy class for the given model...
            return 'App\\Policies\\' . class_basename($modelClass) . 'Policy';
        });
    }
}
