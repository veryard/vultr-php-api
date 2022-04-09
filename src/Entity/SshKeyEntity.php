<?php

namespace Vultr\Entity;

final class SshKeyEntity extends AbstractEntity
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
    public $name;

    /**
     * @var string
     */
    public $ssh_key;
}
