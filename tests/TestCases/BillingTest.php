<?php

namespace Vultr\Tests\TestCases;

use Vultr\Tests\VultrTest;

class BillingTest extends VultrTest
{
    /**
     * @test
     */
    public function testListBilling(): void
    {
        $response = $this->client->billing()->listHistory();

        $this->assertIsArray($response);
    }

    /**
     * @test
     */
    public function testListInvoices(): void
    {
        $response = $this->client->billing()->listInvoices();

        $this->assertIsArray($response);
    }

}
