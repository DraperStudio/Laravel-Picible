<?php

/*
 * This file is part of Laravel Picible.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Picible;

use Illuminate\Foundation\Application;
use Intervention\Image\ImageManager;
use InvalidArgumentException;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();

        $this->publishConfig();
    }

    public function register()
    {
        parent::register();

        $this->mergeConfig();

        $this->app->bind(
            \BrianFaust\Picible\Contracts\PictureRepository::class,
            \BrianFaust\Picible\Repositories\EloquentPictureRepository::class
        );

        $this->app->singleton('BrianFaust\Picible\PicibleService', function (Application $app) {
            $service = new PicibleService(
                $app->make('BrianFaust\Picible\Contracts\PictureRepository'),
                $app,
                $this->setFilesystemAdapter($app),
                new ImageManager()
            );

            return $service;
        });
    }

    protected function setFilesystemAdapter($app)
    {
        $adapterKey = config('picible.default');
        $config = config('picible.adapters.'.$adapterKey);

        if (empty($config)) {
            throw new InvalidArgumentException("Unsupported adapter [$adapterKey]");
        }

        $adapter = $app->make($config['driver']);
        $adapter->setConnection($config['connection']);

        return $adapter;
    }

    public function provides()
    {
        return array_merge(parent::provides(), [
            \BrianFaust\Picible\PicibleService::class,
            \BrianFaust\Picible\Contracts\PictureRepository::class,
        ]);
    }

    public function getPackageName()
    {
        return 'picible';
    }
}
