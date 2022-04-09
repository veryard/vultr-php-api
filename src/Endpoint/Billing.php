<?php

namespace Vultr\Endpoint;

use Vultr\Endpoint\AbstractEndpoint;
use \Vultr\Entity\BillHistoryEntity;
use Vultr\Entity\InvoiceEntry;
use Vultr\Entity\InvoiceItemEntry;

class Billing extends AbstractEndpoint
{
    public function listHistory()
    {
        $history = $this->adapter->get('billing/history');

        // return (new ResultEntity($history))
        //     ->add(
        //         'history',
        //         array_map(function ($history) {
        //             return new BillHistoryEntity($history);
        //         }, $history->billing_history)
        //     );

        return array_map(function ($history) {
            return new BillHistoryEntity($history);
        }, $history->billing_history);
    }

    public function listInvoices()
    {
        $invoices = $this->adapter->get('billing/invoices');

        return array_map(function ($invoice) {
            return new InvoiceEntry($invoice);
        }, $invoices->billing_invoices);
    }

    public function getInvoice($invoiceId)
    {
        $invoice = $this->adapter->get('billing/invoices/' . $invoiceId);

        return new InvoiceEntry($invoice->billing_invoice);
    }

    public function getInvoiceItems($invoiceId)
    {
        $invoice_items = $this->adapter->get('billing/invoices/' . $invoiceId . '/items');

        return array_map(function ($invoice_item) {
            return new InvoiceItemEntry($invoice_item);
        }, $invoice_items->invoice_items);
    }
}
