<?php


namespace App\Services;

use App\Reader;

class ReaderService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Reader::class;
    }
}
