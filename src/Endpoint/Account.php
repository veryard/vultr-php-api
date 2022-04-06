<?php

namespace Vultr\Endpoint;

class Account extends AbstractEndpoint
{
    public function getAccountInfo()
    {
        return $this->adapter->get('account');
    }
}
