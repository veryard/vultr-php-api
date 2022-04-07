<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class SshKeysTest extends VultrTest
{
    /**
     * @test
     */
    public function testListSshKeys(): void
    {
        $response = $this->client->sshKeys()->list();

        $this->assertIsArray($response);
    }
}
