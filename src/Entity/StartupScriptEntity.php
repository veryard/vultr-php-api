<?php

namespace Vultr\Entity;

final class StartupScriptEntity extends AbstractEntity
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
    public $date_modified;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $script;
}
