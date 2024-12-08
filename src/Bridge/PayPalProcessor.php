<?php

namespace MariaS431\Lr\Bridge;

class PayPalProcessor extends PaymentProcessor
{
    public function processPayment(float $amount): string
    {
        return "Оплата по PayPal: \n" . $this->client->pay($amount);
    }
    public function refundPayment(string $transactionId): string
    {
        return "Возврат по PayPal: \n" . $this->client->refund($transactionId);
    }
}
