<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;

class Instances extends AbstractEndpoint
{
    public function list($params = array())
    {
        return $this->adapter->get('instances', $params);
    }

    public function create(array $params)
    {
        if(!isset($params['region'])) {
            throw new \InvalidArgumentException('Region is required');
        }

        if(!isset($params['plan'])) {
            throw new \InvalidArgumentException('Plan is required');
        }

        return $this->adapter->post('instances', $params);
    }

    public function get($instance_id)
    {
        return $this->adapter->get('instances/' . $instance_id);
    }

    public function update($instance_id, array $params = array())
    {
        return $this->adapter->patch('instances/' . $instance_id, $params);
    }

    public function delete($instance_id)
    {
        return $this->adapter->delete('instances/' . $instance_id);
    }

    public function halt($instance_id)
    {
        return $this->adapter->post('instances/' . $instance_id . '/halt', array());
    }

    public function haltInstances(array $instance_ids)
    {
        return $this->adapter->post('instances/halt', array(
            'instance_ids' => $instance_ids,
        ));
    }

    public function reboot($instance_id)
    {
        return $this->adapter->post('instances/'. $instance_id .'/reboot', array());
    }

    public function rebootInstances(array $instance_ids)
    {
        return $this->adapter->post('instances/reboot', array(
            'instance_ids' => $instance_ids,
        ));
    }

    public function start($instance_id)
    {
        return $this->adapter->post('instances/'. $instance_id .'/start', array());
    }

    public function startInstances(array $instance_ids)
    {
        return $this->adapter->post('instances/start', array(
            'instance_ids' => $instance_ids,
        ));
    }

    public function reinstall($instance_id, $hostname = null)
    {
        $params = [];
        if(!is_null($hostname)) {
            $params['hostname'] = $hostname;
        }
        return $this->adapter->post('instances/'. $instance_id .'/reinstall', $params);
    }

    public function bandwidth($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/bandwidth');
    }

    public function neighbors($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/neighbors');
    }

    public function listPrivateNetworks($instance_id, $per_page = null, $cursor = null)
    {
        $params = [];
        if(!is_null($per_page)) {
            $params['per_page'] = $per_page;
        }

        if(!is_null($cursor)) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('instances/'. $instance_id .'/private-networks', $params);
    }

    public function getISOStatus($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/iso');
    }

    public function attachISO($instance_id, $iso_id)
    {
        return $this->adapter->post('instances/'. $instance_id .'/iso/attach', array(
            'iso_id' => $iso_id,
        ));
    }

    public function detachISO($instance_id)
    {
        return $this->adapter->delete('instances/'. $instance_id .'/iso/detach');
    }

    public function attachPrivateNetwork($instance_id, $network_id = null)
    {
        $params = [];
        if(!is_null($network_id)) {
            $params['network_id'] = $network_id;
        }
        return $this->adapter->post('instances/'. $instance_id .'/private-networks/attach', $params);
    }

    public function detachPrivateNetwork($instance_id, $network_id)
    {
        return $this->adapter->delete('instances/'. $instance_id .'/private-networks/detach', array(
            'network_id' => $network_id,
        ));
    }

    public function setBackupSchedule($instance_id, array $params)
    {
        if(!isset($params['type'])) {
            throw new \InvalidArgumentException('Type is required');
        }

        return $this->adapter->post('instances/'. $instance_id .'/backup-schedule', $params);
    }

    public function getBackupSchedule($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/backup-schedule');
    }

    public function restore($instance_id, $backup_id = null, $snapshot_id = null)
    {
        $params = [];
        if(!is_null($backup_id)) {
            $params['backup_id'] = $backup_id;
        }

        if(!is_null($snapshot_id)) {
            $params['snapshot_id'] = $snapshot_id;
        }

        return $this->adapter->post('instances/'. $instance_id .'/restore', $params);
    }

    public function ipv4($instance_id, array $params = array())
    {
        return $this->adapter->get('instances/'. $instance_id .'/ipv4', $params);
    }

    public function createIpv4($instance_id, $reboot = false)
    {
        $params = [];
        if($reboot) {
            $params['reboot'] = $reboot;
        }

        return $this->adapter->post('instances/'. $instance_id .'/ipv4', $params);
    }

    public function ipv6($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/ipv6');
    }

    public function createReverseIpv6($instance_id, $ip, $reverse)
    {
        return $this->adapter->post('instances/'. $instance_id .'/ipv6/reverse', array(
            'ip' => $ip,
            'reverse' => $reverse,
        ));
    }

    public function userData($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/user-data');
    }

    public function setDefaultReverseDnsEntry($instance_id, $ip)
    {
        return $this->adapter->post('instances/'. $instance_id .'/ipv4/default', array(
            'ip' => $ip,
        ));
    }

    public function deleteIpv4($instance_id, $ipv4)
    {
        return $this->adapter->delete('instances/'. $instance_id .'/ipv4/'. $ipv4);
    }

    public function deleteReverseIpv6($instance_id, $ipv6)
    {
        return $this->adapter->delete('instances/'. $instance_id .'/ipv6/reverse/'. $ipv6);
    }

    public function upgrades($instance_id)
    {
        return $this->adapter->get('instances/'. $instance_id .'/upgrades');
    }
}
