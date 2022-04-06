<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;

class Applications extends AbstractEndpoint
{
    public function list()
    {
        return $this->adapter->get('applications');
    }
}
