<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;

class Billing extends AbstractEndpoint
{
    public function listHistory()
    {
        return $this->adapter->get('billing/history');
    }

    public function listInvoices()
    {
        return $this->adapter->get('billing/invoices');
    }

    public function getInvoice($invoiceId)
    {
        return $this->adapter->get('billing/invoices/' . $invoiceId);
    }

    public function getInvoiceItems($invoiceId)
    {
        return $this->adapter->get('billing/invoices/' . $invoiceId . '/items');
    }
}
