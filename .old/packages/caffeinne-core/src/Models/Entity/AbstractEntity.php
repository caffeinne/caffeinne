<?php

declare(strict_types=1);


namespace Caffeinne\Core\Models\Entity;

use Caffeinne\Core\Exceptions\DomainErrorException;
use Caffeinne\Core\Models\Entity\ID;
use Caffeinne\Core\Attributes\GetterAndSetterAttribute;
use ReflectionClass;

abstract class AbstractEntity
{
    #[GetterAndSetterAttribute]
    protected ID $id;

    public function __construct(ID $id)
    {
        $this->id = $id;
    }

    private function canResolveGetterAndSetterAttribute($name)
    {
        $reflection = new ReflectionClass($this);

        $property = $reflection->getProperty($name);

        return count($property->getAttributes(GetterAndSetterAttribute::class)) > 0;
    }

    private function resolveGetterAndSetterAttribute($name, $arguments)
    {
        if($arguments){
            $this->{$name} = $arguments[0];
        }

        return $this->{$name};
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed|null
     * @throws DomainErrorException
     */
    public function __call($method, $arguments)
    {
        if($this->canResolveGetterAndSetterAttribute($method)){
            return $this->resolveGetterAndSetterAttribute($method, $arguments);
        }

        throw new DomainErrorException("Method '{$method}' don't exists.");
    }

}
