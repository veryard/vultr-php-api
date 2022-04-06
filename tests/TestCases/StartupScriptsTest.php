<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class StartupScriptsTest extends VultrTest
{
    /**
     * @test
     */
    public function testListStartupScripts(): void
    {
        $response = $this->client->startupScripts()->list();

        $this->assertIsArray($response);
    }
}
