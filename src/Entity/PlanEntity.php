<?php

namespace Vultr\Entity;

final class PlanEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var int
     */
    public $vcpu_count;

    /**
     * @var int
     */
    public $ram;

    /**
     * @var int
     */
    public $disk;

    /**
     * @var int
     */
    public $disk_count;

    /**
     * @var int
     */
    public $bandwith;

    /**
     * @var int
     */
    public $monthly_cost;

    /**
     * @var string
     */
    public $type;

    /**
     * @var array
     */
    public $locations;
}
