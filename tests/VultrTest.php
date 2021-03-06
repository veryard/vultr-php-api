<?php

namespace Vultr\Tests;

use PHPUnit\Framework\TestCase;
use Vultr\Adapter\CurlAdapter;
use Vultr\Client;

class VultrTest extends TestCase
{

    public Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Client(
            new CurlAdapter(
                'TOKEN HERE'
            )
        );
    }

    public function testCreateClient(): void
    {
        $this->assertInstanceOf(Client::class, $this->client);
    }
}
