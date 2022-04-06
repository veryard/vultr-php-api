<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;

class Instances extends AbstractEndpoint
{
    public function createInstance(array $config)
    {
        $regionId = intval($config['region']);
        $planId = intval($config['plan']);

        if(!$regionId || !$planId) {
            throw new \InvalidArgumentException('Invalid region or plan');
        }

        // $this->isAvailable($regionId, $planId);

        $instance = $this->adapter->post('', $config);

        return $instance;
    }
}
