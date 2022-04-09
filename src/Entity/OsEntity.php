<?php

namespace Vultr\Entity;

final class OsEntity extends AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $arch;

    /**
     * @var string
     */
    public $family;
}
