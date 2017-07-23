<?php

/*
 * This file is part of Laravel Picible.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Picible\Filters;

use Intervention\Image\Image;
use BrianFaust\Picible\Contracts\FilterInterface;

class Rotate implements FilterInterface
{
    public function __construct($config)
    {
        $this->angle = $config['angle'];
    }

    public function applyFilter(Image $image)
    {
        return $image->rotate($this->angle);
    }
}
