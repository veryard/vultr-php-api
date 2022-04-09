<?php

namespace Vultr\Entity;

final class SnapshotEntity extends AbstractEntity
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
    public $description;

    /**
     * @var string
     */
    public $size;

    /**
     * @var int
     */
    public $compressed_size;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $os_id;

    /**
     * @var int
     */
    public $app_id;
}
