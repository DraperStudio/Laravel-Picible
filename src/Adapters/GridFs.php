<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Picible.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Picible\Adapters;

use Artisanry\Picible\Contracts\ShareableInterface;
use Artisanry\Picible\Models\Picture;

class GridFs extends AbstractAdapter implements ShareableInterface
{
    public function getShareableLink(Picture $picture, array $filters = [])
    {
    }
}
