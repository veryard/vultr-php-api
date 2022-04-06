<?php

namespace Vultr\Endpoint;

class Plans extends AbstractEndpoint
{
    public function listPlans()
    {
        return $this->adapter->get('plans');
    }

    public function listBareMetalPlans()
    {
        return $this->adapter->get('plans-metal');
    }

}
