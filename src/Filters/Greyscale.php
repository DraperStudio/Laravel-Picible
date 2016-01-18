<?php

namespace DraperStudio\Picible\Filters;

use DraperStudio\Picible\Contracts\FilterInterface;
use Intervention\Image\Image;

class Greyscale implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->greyscale();
    }
}
