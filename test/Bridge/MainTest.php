<?php 

namespace Test\Bridge;

use MariaS431\Lr\Bridge\LegalClient;
use MariaS431\Lr\Bridge\PayPalProcessor;
use MariaS431\Lr\Bridge\PhysicalClient;
use MariaS431\Lr\Bridge\SBPProcessor;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testSBPCheckLimit()
    {
        $client = new PhysicalClient();
        $sbp = new SBPProcessor($client);
        
        $amountOne = 99999.9;
        $paymentOne = $sbp->processPayment($amountOne);

        $this->assertEquals($paymentOne, "Оплата по СБП: \nФизическое лицо произвело оплату в размере $amountOne денег.\nОстаток лимита: 0.1");

        $amountTwo = 100;
        $paymentTwo = $sbp->processPayment($amountTwo);

        $this->assertEquals($paymentTwo, "Оплата по СБП невозможна, превышен лимит по операции. Максимальная сумма опрерации 0.1 денег.");

        $transactionId = uniqid();
        $refund = $sbp->refundPayment($transactionId, 10);
        $this->assertEquals($refund,"Возврат по СБП: \nФизическое лицо запросило возврат денег по транзакции " . $transactionId . "\nОбщий лимит: 10.1");
    }

    public function testSBPClients()
    {
        $client1 = new PhysicalClient();
        $client2 = new LegalClient($inn = "4890000191983");

        $sbp = new SBPProcessor($client1);

        $amountOne = 50000;
        $paymentOne = $sbp->processPayment($amountOne);

        $this->assertEquals($paymentOne, "Оплата по СБП: \nФизическое лицо произвело оплату в размере $amountOne денег.\nОстаток лимита: 50000");

        $sbp->changeClient($client2);

        $amountTwo = 100;
        $paymentTwo = $sbp->processPayment($amountTwo);

        $this->assertEquals($paymentTwo, "Оплата по СБП: \nЮридическое лицо (ИНН: $inn) произвело оплату в размере $amountTwo денег.\nОстаток лимита: 49900");
    }

    public function testPayPal()
    {
        $client1 = new PhysicalClient();
        $client2 = new LegalClient($inn = "test_inn");

        $paypal = new PayPalProcessor($client1);

        $amountOne = 50000;
        $paymentOne = $paypal->processPayment($amountOne);

        $this->assertEquals($paymentOne, "Оплата по PayPal: \nФизическое лицо произвело оплату в размере $amountOne денег.");

        $paypal->changeClient($client2);

        $amountTwo = 100;
        $paymentTwo = $paypal->processPayment($amountTwo);

        $this->assertEquals($paymentTwo, "Оплата по PayPal: \nЮридическое лицо (ИНН: $inn) произвело оплату в размере $amountTwo денег.");
    }
}
