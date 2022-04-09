<?php

namespace Vultr\Entity;

final class DomainEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @var string
     */
    public $dns_sec;
}
