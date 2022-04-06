<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class ApplicationsTest extends VultrTest
{
    /**
     * @test
     */
    public function testListApplications(): void
    {
        $response = $this->client->applications()->list();

        $this->assertIsArray($response);
    }

}
