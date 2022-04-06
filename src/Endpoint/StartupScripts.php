<?php

namespace Vultr\Endpoint;

class StartupScripts extends AbstractEndpoint
{
    public function get($startup_id)
    {
        return $this->adapter->get('startup-scripts/' . $startup_id);
    }

    public function delete($startup_id)
    {
        return $this->adapter->delete('startup-scripts/' . $startup_id);
    }

    public function update($startup_id, $params = array())
    {
        return $this->adapter->patch('startup-scripts/' . $startup_id, $params);
    }

    public function list()
    {
        return $this->adapter->get('startup-scripts');
    }

    public function create($params)
    {
        if(!isset($params['name'])) {
            throw new \InvalidArgumentException('Name is required');
        }

        if(!isset($params['script'])) {
            throw new \InvalidArgumentException('Script is required');
        }

        return $this->adapter->post('startup-scripts', $params);
    }
}
