<?php

namespace Vultr\Entity;

final class InvoiceEntry extends AbstractEntity
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
