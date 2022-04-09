<?php

namespace Vultr\Endpoint;

use Vultr\Entity\PlanEntity;
use Vultr\Entity\PlanMetalEntity;

class Plans extends AbstractEndpoint
{
    public function listPlans()
    {
        $plans = $this->adapter->get('plans');

        return array_map(function ($plan) {
            return new PlanEntity($plan);
        }, $plans->plans);
    }

    public function listBareMetalPlans()
    {
        $plans = $this->adapter->get('plans-metal');

        return array_map(function ($plan) {
            return new PlanMetalEntity($plan);
        }, $plans->plans);
    }

}
