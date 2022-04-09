<?php

namespace Vultr\Entity;

final class LoadBalanceEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $date_created;

    /**
     * @var string
     */
    public $region;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $ipv4;

    /**
     * @var string
     */
    public $ipv6;

    /**
     * @var string
     */
    public $generic_info;

    /**
     * @var string
     */
    public $health_check;

    /**
     * @var boolean
     */
    public $has_ssl;

    /**
     * @var string
     */
    public $forwarding_rules;

    /**
     * @var string
     */
    public $firewall_rules;

    /**
     * @var string
     */
    public $instances;

}
