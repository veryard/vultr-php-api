<?php

namespace Vultr\Endpoint;

class Snapshots extends AbstractEndpoint
{
    public function delete($snapshot_id)
    {
        return $this->adapter->delete('snapshots/' . $snapshot_id);
    }

    public function get($snapshot_id)
    {
        return $this->adapter->get('snapshots/' . $snapshot_id);
    }

    public function update($snapshot_id, $description)
    {
        return $this->adapter->put('snapshots/' . $snapshot_id, array(
            'description' => $description,
        ));
    }

    public function list($description = null, $per_page, $cursor = null)
    {
        $params = [];
        if(!is_null($description)) {
            $params['description'] = $description;
        }

        if(!is_null($per_page)) {
            $params['per_page'] = $per_page;
        }

        if(!is_null($cursor)) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('snapshots', $params);
    }

    public function create($instance_id, $description = null)
    {
        $params = [
            'instance_id' => $instance_id,
        ];

        if(!is_null($description)) {
            $params['description'] = $description;
        }

        return $this->adapter->post('snapshots', $params);
    }

    public function createFromUrl($instance_id, $url, $description = null)
    {
        $params = [
            'instance_id' => $instance_id,
            'url' => $url,
        ];

        if(!is_null($description)) {
            $params['description'] = $description;
        }

        return $this->adapter->post('snapshots/create-from-url', $params);
    }

}
