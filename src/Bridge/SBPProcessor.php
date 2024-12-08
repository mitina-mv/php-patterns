<?php

namespace MariaS431\Lr\Bridge;

class SBPProcessor extends PaymentProcessor
{
    
    private float $limit = 100000;

    public function processPayment(float $amount): string
    {
        $limitAfterTransaction = $this->limit - $amount;

        if($this->limit > 0 && $limitAfterTransaction >= 0)
        {
            $this->limit = (float) round($limitAfterTransaction, 2);
            return "Оплата по СБП: \n" . $this->client->pay($amount) . "\nОстаток лимита: {$this->limit}";
        }

        return "Оплата по СБП невозможна, превышен лимит по операции. Максимальная сумма опрерации {$this->limit} денег.";
    }
    public function refundPayment(string $transactionId, float $amount = -1): string
    {
        if($amount == -1)
        {
            $amount = rand(0, (100000 - $this->limit));
        }

        $this->limit += (float) number_format($amount, 2);
        return "Возврат по СБП: \n" . $this->client->refund($transactionId) . "\nОбщий лимит: {$this->limit}";
    }
}
