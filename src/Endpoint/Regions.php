<?php

namespace Vultr\Endpoint;

use Vultr\Entity\RegionEntity;

class Regions extends AbstractEndpoint
{
    public function list()
    {
        $regions = $this->adapter->get('regions');

        return array_map(function ($region) {
            return new RegionEntity($region);
        }, $regions->regions);
    }

    public function available($region_id)
    {
        return $this->adapter->get('regions/' . $region_id . '/availability');
    }
}
