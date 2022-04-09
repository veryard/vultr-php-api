<?php

namespace Vultr\Endpoint;

use Vultr\Entity\AccountEntity;

class Account extends AbstractEndpoint
{
    public function getAccountInfo(): AccountEntity
    {
        $account = $this->adapter->get('account');

        return new AccountEntity($account->account);
    }
}
