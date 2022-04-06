<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class BackupsTest extends VultrTest
{
    /**
     * @test
     */
    public function testListBackups(): void
    {
        $response = $this->client->backups()->list();

        $this->assertIsArray($response);
    }
}
