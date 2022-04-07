<?php

namespace Vultr\Endpoint;

class LoadBalancers extends AbstractEndpoint
{
    public function list($per_page = null, $cursor = null)
    {
        $params = [];
        if(!is_null($per_page)) {
            $params['per_page'] = $per_page;
        }

        if(!is_null($cursor)) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('load-balancers', $params);
    }

    public function create(array $params)
    {
        if(!isset($params['region'])) {
            throw new \InvalidArgumentException('Region is required');
        }

        return $this->adapter->post('load-balancers', $params);
    }

    public function get($load_balancer_id)
    {
        return $this->adapter->get('load-balancers/' . $load_balancer_id);
    }

    public function update($load_balancer_id, array $params = array())
    {
        return $this->adapter->patch('load-balancers/' . $load_balancer_id, $params);
    }

    public function delete($load_balancer_id)
    {
        return $this->adapter->delete('load-balancers/' . $load_balancer_id);
    }

    public function listFollowingRules($load_balancer_id, $per_page = null, $cursor = null)
    {
        $params = [];
        if(!is_null($per_page)) {
            $params['per_page'] = $per_page;
        }

        if(!is_null($cursor)) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('load-balancers/' . $load_balancer_id . '/following-rules', $params);
    }

    public function createForwardingRule($load_balancer_id, array $params)
    {
        if(!isset($params['frontend_protocol'])) {
            throw new \InvalidArgumentException('Frontend protocol is required');
        }

        if(!isset($params['frontend_port'])) {
            throw new \InvalidArgumentException('Frontend port is required');
        }

        if(!isset($params['backend_protocol'])) {
            throw new \InvalidArgumentException('Backend protocol is required');
        }

        if(!isset($params['backend_port'])) {
            throw new \InvalidArgumentException('Backend port is required');
        }

        return $this->adapter->post('load-balancers/' . $load_balancer_id . '/forwarding-rules', $params);
    }

    public function getForwardingRule($load_balancer_id, $forwarding_rule_id)
    {
        return $this->adapter->get('load-balancers/' . $load_balancer_id . '/forwarding-rules/' . $forwarding_rule_id);
    }

    public function deleteForwardingRule($load_balancer_id, $forwarding_rule_id)
    {
        return $this->adapter->delete('load-balancers/' . $load_balancer_id . '/forwarding-rules/' . $forwarding_rule_id);
    }

    public function listFirewallRules($load_balancer_id, $per_page = null, $cursor = null)
    {
        $params = [];
        if(!is_null($per_page)) {
            $params['per_page'] = $per_page;
        }

        if(!is_null($cursor)) {
            $params['cursor'] = $cursor;
        }

        return $this->adapter->get('load-balancers/' . $load_balancer_id . '/firewall-rules', $params);
    }

    public function getFirewallRule($load_balancer_id, $firewall_rule_id)
    {
        return $this->adapter->get('load-balancers/' . $load_balancer_id . '/firewall-rules/' . $firewall_rule_id);
    }
}
