<?php

namespace Vultr\Endpoint;

class OS extends AbstractEndpoint
{
    public function list()
    {
        return $this->adapter->get('os');
    }

}
