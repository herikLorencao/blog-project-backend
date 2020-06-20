<?php


namespace App\Services;


use App\Admin;

class AdminService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Admin::class;
    }
}
