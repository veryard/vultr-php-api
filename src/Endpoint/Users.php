<?php

namespace Vultr\Endpoint;

class Users extends AbstractEndpoint
{
    public function getUsers($per_page = null, $cursor = null)
    {
        $params = [];
        if ($per_page) {
            $params['per_page'] = $per_page;
        }
        if ($cursor) {
            $params['cursor'] = $cursor;
        }
        return $this->adapter->get('users', $params);
    }

    public function getUser($user_id)
    {
        return $this->adapter->get('users/' . $user_id);
    }

    public function deleteUser($user_id)
    {
        return $this->adapter->delete('users/' . $user_id);
    }

    public function updateUser($user_id, $params = array())
    {
        return $this->adapter->patch('users/' . $user_id, $params);
    }

    public function createUser($params)
    {
        if(!isset($params['email'])) {
            throw new \InvalidArgumentException('Email is required');
        }

        if(!isset($params['name'])) {
            throw new \InvalidArgumentException('Name is required');
        }

        if(!isset($params['password'])) {
            throw new \InvalidArgumentException('Password is required');
        }

        return $this->adapter->post('users', $params);
    }
}
