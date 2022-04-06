<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class UsersTest extends VultrTest
{
    /**
     * @test
     */
    public function testGetUsers(): void
    {
        $response = $this->client->users()->getUsers();

        $this->assertIsArray($response);
    }
}
