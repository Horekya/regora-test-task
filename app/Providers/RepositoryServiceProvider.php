<?php

namespace App\Providers;

use App\Repositories\ArrayPatientRepository;
use App\Repositories\Interfaces\PatientRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bindIf(PatientRepositoryInterface::class, ArrayPatientRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
