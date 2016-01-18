<?php

namespace DraperStudio\Picible\Contracts;

interface PictureRepository
{
    public function create($attributes);

    public function getById($id);

    public function getBySlot($slot, Picible $picible = null);
}
