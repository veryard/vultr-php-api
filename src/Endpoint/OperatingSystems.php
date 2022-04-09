<?php

namespace Vultr\Endpoint;

use Vultr\Entity\OsEntity;

class OperatingSystems extends AbstractEndpoint
{
    public function list()
    {
        $systems = $this->adapter->get('os');

        return array_map(function ($system) {
            return new OsEntity($system);
        }, $systems->os);
    }

}
