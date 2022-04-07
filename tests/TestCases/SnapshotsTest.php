<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class SnapshotsTest extends VultrTest
{
    /**
     * @test
     */
    public function testRegionsList(): void
    {
        $response = $this->client->regions()->list();

        $this->assertIsArray($response);
    }
}