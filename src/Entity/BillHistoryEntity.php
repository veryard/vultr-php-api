<?php

namespace Vultr\Entity;

final class BillHistoryEntity extends AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $description;

    /**
     * @var double
     */
    public $amount;

    /**
     * @var double
     */
    public $balance;
}
