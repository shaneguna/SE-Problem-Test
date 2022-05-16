<?php

namespace App\Providers;

use App\Repositories\Interfaces\PlayerRepositoryInterface;
use App\Repositories\Interfaces\PlayerTotalRepositoryInterface;
use App\Repositories\PlayerRepository;
use App\Repositories\PlayerTotalRepository;
use App\Services\Exporter\Drivers\PlayerStatsExporterDriver;
use App\Services\Exporter\ExporterFactory;
use App\Services\Exporter\Interfaces\ExporterDriverInterface;
use App\Services\Exporter\Interfaces\ExporterFactoryInterface;
use App\Services\PlayerStats\Interfaces\PlayerStatsDetailsMapperInterface;
use App\Services\PlayerStats\Mappers\PlayerStatsDetailsMapper;
use App\Services\Utilities\Interfaces\ParserInterface;
use App\Services\Utilities\XmlParser;
use Illuminate\Contracts\Foundation\Application;
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
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(PlayerStatsDetailsMapperInterface::class, PlayerStatsDetailsMapper::class);
        $this->app->bind(PlayerTotalRepositoryInterface::class, PlayerTotalRepository::class);
        $this->app->bind(ParserInterface::class, XmlParser::class);

        $this->app->tag([
            PlayerStatsExporterDriver::class,
        ], [ExporterDriverInterface::class]);

        $this->app->bind(
            ExporterFactoryInterface::class,
            static function (Application $application): ExporterFactory {
                return new ExporterFactory(
                    $application->tagged(ExporterDriverInterface::class)
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
