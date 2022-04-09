<?php

namespace Vultr\Entity;

final class PlanMetalEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var int
     */
    public $cpu_count;

    /**
     * @var int
     */
    public $cpu_threads;

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
