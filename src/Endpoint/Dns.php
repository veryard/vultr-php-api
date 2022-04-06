<?php

namespace Vultr\Endpoint;

class Dns extends AbstractEndpoint
{
    public function listDomains()
    {
        return $this->adapter->get('domains');
    }

    public function createDomain($domain, $ip = null, $dns_sec = null)
    {
        $params = [
            'domain' => $domain,
        ];
        if ($ip) {
            $params['ip'] = $ip;
        }

        if ($dns_sec) {
            $params['dns_sec'] = $dns_sec;
        }

        return $this->adapter->post('domains', $params);
    }

    public function getDnsDomain($dns_domain)
    {
        return $this->adapter->get('domains/' . $dns_domain);
    }

    public function deleteDomain($dns_domain)
    {
        return $this->adapter->delete('domains/' . $dns_domain);
    }

    public function updateDnsDomain($dns_domain, $dns_sec)
    {
        $params = [
            'dns_sec' => $dns_sec,
        ];

        return $this->adapter->put('domains/' . $dns_domain, $params);
    }

    public function getSoaInfo($dns_domain)
    {
        return $this->adapter->get('domains/' . $dns_domain . '/soa');
    }

    public function updateSoaInfo($dns_domain, $ns_primary = null, $email = null)
    {
        $params = [];
        if ($ns_primary) {
            $params['ns_primary'] = $ns_primary;
        }
        if ($email) {
            $params['email'] = $email;
        }

        return $this->adapter->patch('domains/' . $dns_domain . '/soa', $params);
    }

    public function getDnsSecInfo($dns_domain)
    {
        return $this->adapter->get('domains/' . $dns_domain . '/dnssec');
    }

    public function createRecord($dns_domain, array $params)
    {
        if(!isset($params['name'])) {
            throw new \InvalidArgumentException('name is required');
        }

        if(!isset($params['type'])) {
            throw new \InvalidArgumentException('type is required');
        }

        if(!isset($params['data'])) {
            throw new \InvalidArgumentException('data is required');
        }

        return $this->adapter->post('domains/' . $dns_domain . '/records', $params);
    }

    public function listRecords($dns_domain, $per_page = null, $cursor = null)
    {
        $params = [];
        if ($per_page) {
            $params['per_page'] = $per_page;
        }
        if ($cursor) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('domains/' . $dns_domain . '/records', $params);
    }

    public function getRecord($dns_domain, $record_id)
    {
        return $this->adapter->get('domains/' . $dns_domain . '/records/' . $record_id);
    }

    public function updateRecord($dns_domain, $record_id, $params = array())
    {
        return $this->adapter->patch('domains/' . $dns_domain . '/records/' . $record_id, $params);
    }

    public function deleteRecord($dns_domain, $record_id)
    {
        return $this->adapter->delete('domains/' . $dns_domain . '/records/' . $record_id);
    }
}
