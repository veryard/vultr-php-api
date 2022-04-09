<?php

namespace Vultr\Entity;

final class RegionEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $continent;

    /**
     * @var array
     */
    public $options;


}
