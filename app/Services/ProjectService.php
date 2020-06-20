<?php


namespace App\Services;

use App\Project;

class ProjectService extends DefaultService
{
    public function __construct()
    {
        $this->resourceName = Project::class;
    }
}
