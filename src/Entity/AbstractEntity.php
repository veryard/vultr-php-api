<?php

namespace Vultr\Entity;

use ReflectionClass;
use ReflectionProperty;

abstract class AbstractEntity
{
    public function __construct($parameters = null)
    {
        if($parameters == null) {
            return;
        }

        if(is_object($parameters)) {
            $parameters = get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    public function __get($property)
    {
        $property = $this->snakeCase($property);
        if(property_exists($this, $property)) {
            return $this->{$property};
        }

        return null;
    }

    public function add($property, $value)
    {
        $property = $this->snakeCase($property);
        if(!property_exists($this, $property)) {
            $this->{$property} = $value;
        }

        return $this;
    }

    public function build(array $parameters)
    {
        foreach($parameters as $property => $value) {
            $property = $this->snakeCase($property);
            if(property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    public function toArray()
    {
        $array = [];
        $called = self::class;

        $reflection = new ReflectionClass($called);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach($properties as $property) {
            $name = $property->getName();
            if(isset($this->{$name}) && $property->class == $called) {
                $array[$this->snakeCase($name)] = $this->{$name};
            }
        }

        return $array;
    }

    public function snakeCase($property)
    {
        $property = preg_replace('/([a-z])([A-Z])/', '$1_$2', $property);
        return strtolower($property);
    }

    public function camelCase($property)
    {
        $property = preg_replace('/([a-z])([A-Z])/', '$1 $2', $property);
        return lcfirst(str_replace(' ', '', ucwords($property)));
    }
}
