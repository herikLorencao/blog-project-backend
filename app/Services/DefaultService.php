<?php


namespace App\Services;


use App\Exceptions\DatabaseQueryException;
use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Cache;

abstract class DefaultService
{
    /** @var string $resourceName */
    protected $resourceName;

    public function findAll($resourcesPerPage)
    {
        if (Cache::has($this->resourceName)) {
            return Cache::get($this->resourceName);
        }

        $results = $this->resourceName::paginate($resourcesPerPage);
        Cache::put($this->resourceName, $results, 600);

        return $results;
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
            $result = $this->resourceName::create($resourceData);
            Cache::pull($this->resourceName);
            return $result;
        } catch (QueryException $e) {
            throw new DatabaseQueryException("Verifique se os dados informados e relacionamentos estão corretos");
        }
    }

    public function update(int $id, array $resourceData)
    {
        $resource = $this->findById($id);

        try {
            $resource->fill($resourceData);
            Cache::pull($this->resourceName);
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

        Cache::pull($this->resourceName);
    }
}
