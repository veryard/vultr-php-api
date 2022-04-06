<?php

namespace Vultr;

use Vultr\Adapter\AdapterInterface;

use Vultr\Endpoint\Account;
use Vultr\Endpoint\Applications;
use Vultr\Endpoint\Backups;
use Vultr\Endpoint\Billing;
use Vultr\Endpoint\Dns;
use Vultr\Endpoint\Instances;
use Vultr\Endpoint\OS;
use Vultr\Endpoint\Plans;
use Vultr\Endpoint\Regions;
use Vultr\Endpoint\StartupScripts;
use Vultr\Endpoint\Users;

class Client {
    const BASE_URL = 'https://api.vultr.com/v2/';
    const USER_AGENT = 'vultr-php-api/1.0.0';

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function instances()
    {
        return new Instances($this->adapter);
    }

    public function plans()
    {
        return new Plans($this->adapter);
    }

    public function account()
    {
        return new Account($this->adapter);
    }

    public function applications()
    {
        return new Applications($this->adapter);
    }

    public function backups()
    {
        return new Backups($this->adapter);
    }

    public function billing()
    {
        return new Billing($this->adapter);
    }

    public function dns()
    {
        return new Dns($this->adapter);
    }

    public function users()
    {
        return new Users($this->adapter);
    }

    public function startupScripts()
    {
        return new StartupScripts($this->adapter);
    }

    public function regions()
    {
        return new Regions($this->adapter);
    }

    public function os()
    {
        return new OS($this->adapter);
    }
}
