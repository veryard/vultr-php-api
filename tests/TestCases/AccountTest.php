<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class AccountTest extends VultrTest
{
    /**
     * @test
     */
    public function testAccountInfo(): void
    {
        $response = $this->client->account()->getAccountInfo();

        $this->assertIsArray($response);
    }

}
