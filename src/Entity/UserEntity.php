<?php

namespace Vultr\Entity;

final class UserEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var boolean
     */
    public $api_enabled;

    /**
     * @var array
     */
    public $acls;
}
