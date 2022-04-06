<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class DnsTest extends VultrTest
{
    /**
     * @test
     */
    public function testListDns(): void
    {
        $response = $this->client->dns()->listDomains();

        $this->assertIsArray($response);
    }
}
