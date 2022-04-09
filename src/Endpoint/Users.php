<?php

namespace Vultr\Endpoint;

use Vultr\Entity\UserEntity;

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

        $users = $this->adapter->get('users', $params);
        
        return array_map(function ($user) {
            return new UserEntity($user);
        }, $users->users);
    }

    public function getUser($user_id)
    {
        $user = $this->adapter->get('users/' . $user_id);

        return new UserEntity($user->user);
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

        $user = $this->adapter->post('users', $params);

        return new UserEntity($user->user);
    }
}
