<?php

namespace Vultr\Endpoint;

use Vultr\Adapter\AdapterInterface;

abstract class AbstractEndpoint 
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
