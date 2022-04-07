<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class InstancesTest extends VultrTest
{
    /**
     * @test
     */
    public function testInstancesList(): void
    {
        $response = $this->client->instances()->list();

        $this->assertIsArray($response);
    }
}
