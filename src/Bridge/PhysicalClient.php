<?php

namespace MariaS431\Lr\Bridge;

class PhysicalClient implements IClient
{
    public function pay(float $amount): string
    {
        return "Физическое лицо произвело оплату в размере $amount денег.";
    }
    public function refund(string $transactionId): string
    {
        return "Физическое лицо запросило возврат денег по транзакции $transactionId";
    }
}
