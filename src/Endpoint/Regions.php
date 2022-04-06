<?php

namespace Vultr\Endpoint;

class Regions extends AbstractEndpoint
{
    public function list()
    {
        return $this->adapter->get('regions');
    }

    public function available($region_id)
    {
        return $this->adapter->get('regions/' . $region_id . '/availability');
    }

}
