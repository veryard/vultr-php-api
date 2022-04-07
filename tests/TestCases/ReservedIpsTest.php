<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class ReservedIpsTest extends VultrTest
{
    /**
     * @test
     */
    public function testListReservedIps(): void
    {
        $response = $this->client->reserveredIps()->list();

        $this->assertIsArray($response);
    }
}
