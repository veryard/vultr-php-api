<?php

namespace Vultr\Endpoint;

class OperatingSystems extends AbstractEndpoint
{
    public function list()
    {
        return $this->adapter->get('os');
    }

}
