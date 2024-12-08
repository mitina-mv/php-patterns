<?php

namespace MariaS431\Lr\Bridge;

class LegalClient implements IClient
{
    public function __construct(
        public string $inn,
    ){}
    public function pay(float $amount): string
    {
        return "Юридическое лицо (ИНН: {$this->inn}) произвело оплату в размере $amount денег.";
    }
    public function refund(string $transactionId): string
    {
        return "Юридическое лицо (ИНН: {$this->inn}) запросило возврат денег по транзакции $transactionId";
    }
}
