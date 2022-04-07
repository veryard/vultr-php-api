<?php

namespace Vultr\Endpoint;

class SshKeys extends AbstractEndpoint
{
    public function get($ssh_key_id)
    {
        return $this->adapter->get('ssh-keys/' . $ssh_key_id);
    }

    public function update($ssh_key_id, array $data = array())
    {
        return $this->adapter->patch('ssh-keys/' . $ssh_key_id, $data);
    }

    public function delete($ssh_key_id)
    {
        return $this->adapter->delete('ssh-keys/' . $ssh_key_id);
    }

    public function list($per_page = null, $cursor = null)
    {
        $params = array();
        if ($per_page) {
            $params['per_page'] = $per_page;
        }
        if ($cursor) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('ssh-keys', $params);
    }

    public function create(array $data)
    {
        if(!isset($data['name'])) {
            throw new \InvalidArgumentException('name is required');
        }

        if(!isset($data['ssh_key'])) {
            throw new \InvalidArgumentException('ssh_key is required');
        }
        
        return $this->adapter->post('ssh-keys', $data);
    }
}
