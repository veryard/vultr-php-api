<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;

class Backups extends AbstractEndpoint
{
    public function list($instance_id = null, $per_page = null, $cursor = null)
    {
        $params = [];
        if ($instance_id) {
            $params['instance_id'] = $instance_id;
        }
        if ($per_page) {
            $params['per_page'] = $per_page;
        }
        if ($cursor) {
            $params['cursor'] = $cursor;
        }
        return $this->adapter->get('backups', $params);
    }

    public function get($backup_id)
    {
        return $this->adapter->get('backups/' . $backup_id);
    }
}
