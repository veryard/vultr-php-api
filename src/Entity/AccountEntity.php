<?php

namespace Vultr\Entity;

final class AccountEntity extends AbstractEntity
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var array
     */
    public $acls;

    /**
     * @var double
     */
    public $balance;

    /**
     * @var double
     */
    public $pending_charges;

    /**
     * @var date
     */
    public $last_payment_date;

    /**
     * @var double
     */
    public $last_payment_amount;
}
