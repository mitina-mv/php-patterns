<?php

namespace MariaS431\Lr\Bridge;

abstract class PaymentProcessor
{
    public function __construct(
        public IClient $client
    ) {
    }
    public function changeClient(IClient $client): void
    {
        $this->client = $client;
    }
    abstract public function processPayment(float $amount): string;
    abstract public function refundPayment(string $transactionId): string;
}
