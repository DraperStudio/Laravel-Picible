<?php

/*
 * This file is part of Laravel Picible.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Picible;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Picible\ServiceProvider::class;
    }
}
