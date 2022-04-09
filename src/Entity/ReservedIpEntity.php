<?php

namespace Vultr\Entity;

final class ReservedIpEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $region;

    /**
     * @var string
     */
    public $ip_type;

    /**
     * @var string
     */
    public $subnet;

    /**
     * @var string
     */
    public $subnet_size;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $instance_id;
}
