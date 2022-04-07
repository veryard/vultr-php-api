<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class RegionsTest extends VultrTest
{
    /**
     * @test
     */
    public function testSnapshotsList(): void
    {
        $response = $this->client->regions()->list();

        $this->assertIsArray($response);
    }
}
