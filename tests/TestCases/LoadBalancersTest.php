<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class LoadBalancersTest extends VultrTest
{
    /**
     * @test
     */
    public function testLoadBalancersList(): void
    {
        $response = $this->client->loadBalancers()->list();

        $this->assertIsArray($response);
    }
}
