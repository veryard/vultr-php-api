<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class PlansTest extends VultrTest
{
    /**
     * @test
     */
    public function testListPlans(): void
    {
        $response = $this->client->plans()->listPlans();

        $this->assertIsArray($response);
    }

    /**
     * @test
     */
    public function testListBareMetalPlans(): void 
    {
        $response = $this->client->plans()->listBareMetalPlans();

        $this->assertIsArray($response);
    }
}
