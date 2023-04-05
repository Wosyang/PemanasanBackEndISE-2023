<?php

namespace App\Providers;

use App\Core\Domain\Repository\SqlProvinsiRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SqlProvinsiRepository::class, function ($app) {
            return new SqlProvinsiRepository();
        });
    }
}
