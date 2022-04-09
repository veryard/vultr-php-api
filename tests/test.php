<?php

require __DIR__ . '/../vendor/autoload.php';

use Vultr\Adapter\CurlAdapter;
use Vultr\Client;

$vultr = new Client(
    new CurlAdapter(
        'UPFWTZFR7VZ7NQBWX4RTKP6NR7ASNYS22FGQ'
    )
);

var_dump($vultr->users()->getUsers());
