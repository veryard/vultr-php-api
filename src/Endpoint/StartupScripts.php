<?php

namespace Vultr\Endpoint;

use Vultr\Entity\StartupScriptEntity;

class StartupScripts extends AbstractEndpoint
{
    public function get($startup_id)
    {
        $script = $this->adapter->get('startup-scripts/' . $startup_id);

        return new StartupScriptEntity($script->startup_script);
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
        $scripts = $this->adapter->get('startup-scripts');

        return array_map(function ($script) {
            return new StartupScriptEntity($script);
        }, $scripts->startup_scripts);
    }

    public function create($params)
    {
        if(!isset($params['name'])) {
            throw new \InvalidArgumentException('Name is required');
        }

        if(!isset($params['script'])) {
            throw new \InvalidArgumentException('Script is required');
        }

        $script = $this->adapter->post('startup-scripts', $params);

        return new StartupScriptEntity($script->startup_script);
    }
}
