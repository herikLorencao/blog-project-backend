<?php


namespace App\Services;


use App\Exceptions\ResourceNotFoundException;

abstract class DefaultService
{
    /** @var string $resourceName */
    protected $resourceName;

    public function findAll($resourcesPerPage)
    {
        return $this->resourceName::paginate($resourcesPerPage);
    }

    public function findById(int $id)
    {
        $resource = $this->resourceName::find($id);

        if (is_null($resource)) {
            throw new ResourceNotFoundException('O recurso buscado não existe');
        }

        return $resource;
    }

    public function save(array $resourceData)
    {
        return $this->resourceName::create($resourceData);
    }

    public function update(int $id, array $resourceData)
    {
        $resource = $this->findById($id);
        $resource->fill($resourceData);
        $resource->save();

        return $resource;
    }

    public function remove(int $id)
    {
        $qtdResourcesRemoved = $this->resourceName::destroy($id);

        if ($qtdResourcesRemoved === 0) {
            throw new ResourceNotFoundException('O recurso buscado não existe');
        }
    }
}
