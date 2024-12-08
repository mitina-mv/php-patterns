<?php

namespace MariaS431\Lr\Bridge;

interface IClient
{
    public function pay(float $amount): string;
    public function refund(string $transactionId): string;
}