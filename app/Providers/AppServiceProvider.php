<?php

namespace App\Providers;

use App\Repositories\Contracts\PinRepository;
use App\Repositories\Contracts\PinStatusRepository;
use App\Repositories\IpfsPinRepository;
use App\Repositories\IpfsPinStatusRepository;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Ipfs\Drivers\HttpClient;
use Ipfs\Ipfs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Ipfs::class, function ($app) {
            return new Ipfs(
                new HttpClient(
                    config('ipfs.api.server'),
                    config('ipfs.api.port'),
                    [
                        "timeout" => 999.0
                    ]
                )
            );
        });

        $this->app->bind(PinStatusRepository::class, IpfsPinStatusRepository::class);
        $this->app->bind(PinRepository::class, IpfsPinRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
