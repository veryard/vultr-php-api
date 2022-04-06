<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class OSTest extends VultrTest
{
    /**
     * @test
     */
    public function testOSList(): void
    {
        $response = $this->client->os()->list();

        $this->assertIsArray($response);
    }
}
