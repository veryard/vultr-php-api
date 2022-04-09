<?php

namespace Vultr\Entity;

final class InvoiceItemEntry extends AbstractEntity
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $product;

    /**
     * @var string
     */
    public $start_date;

    /**
     * @var string
     */
    public $end_date;

    /**
     * @var string
     */
    public $units;

    /**
     * @var string
     */
    public $unit_type;

    /**
     * @var string
     */
    public $unit_price;

    /**
     * @var string
     */
    public $price;
}
