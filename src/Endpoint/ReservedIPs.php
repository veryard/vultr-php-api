<?php

namespace Vultr\Endpoint;

use Vultr\Entity\ReservedIpEntity;

class ReservedIps extends AbstractEndpoint
{
    public function get($reserved_ip)
    {
        $reserved_ip = $this->adapter->get('reserved-ips/' . $reserved_ip);

        return new ReservedIpEntity($reserved_ip->reserved_ip);
    }

    public function delete($reserved_ip)
    {
        return $this->adapter->delete('reserved-ips/' . $reserved_ip);
    }

    public function list()
    {
        $reserved_ips = $this->adapter->get('reserved-ips');

        return array_map(function ($reserved_ip) {
            return new ReservedIpEntity($reserved_ip);
        }, $reserved_ips->reserved_ips);
    }

    public function create($reserved_ip, $ip_type, $description = null)
    {
        $params = [
            'reserved_ip' => $reserved_ip,
            'ip_type' => $ip_type,
        ];

        if (!is_null($description)) {
            $params['description'] = $description;
        }

        $reserved_ip = $this->adapter->post('reserved-ips', $params);

        return new ReservedIpEntity($reserved_ip->reserved_ip);
    }

    public function attach($reserved_ip, $instance_id)
    {
        return $this->adapter->post('reserved-ips/' . $reserved_ip . '/attach', array(
            'instance_id' => $instance_id,
        ));
    }

    public function detach($reserved_ip)
    {
        return $this->adapter->post('reserved-ips/' . $reserved_ip . '/detach', array());
    }

    public function convertIpToReservedIp($ip, $label = null)
    {
        $params = [
            'ip' => $ip,
        ];

        if (!is_null($label)) {
            $params['label'] = $label;
        }

        $reserved_ip = $this->adapter->post('reserved-ips/convert', $params);

        return new ReservedIpEntity($reserved_ip->reserved_ip);
    }
}
