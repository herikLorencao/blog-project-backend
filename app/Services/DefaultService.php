<?php


namespace App\Services;


use App\Exceptions\DatabaseQueryException;
use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\QueryException;

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
        try {
            return $this->resourceName::create($resourceData);
        } catch (QueryException $e) {
            throw new DatabaseQueryException("Verifique se os dados informados e relacionamentos estão corretos");
        }
    }

    public function update(int $id, array $resourceData)
    {
        $resource = $this->findById($id);

        try {
            $resource->fill($resourceData);
            $resource->save();
        } catch (QueryException $e) {
            throw new DatabaseQueryException("Verifique se os dados informados e relacionamentos estão corretos");
        }

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
