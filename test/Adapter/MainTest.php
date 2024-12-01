<?php

declare(strict_types=1);

namespace Test\Adapter;

use PHPUnit\Framework\TestCase;
use MariaS431\Lr\Adapter\MicroUSBCharger;
use MariaS431\Lr\Adapter\MicroUSBToUSBCAdapter;
use MariaS431\Lr\Adapter\Phone;
use MariaS431\Lr\Adapter\USB_C;

class MainTest extends TestCase
{
    public function testChargeUsbC(): void
    {
        $phone = new Phone();
        $usbc = new USB_C();

        $result = $phone->charging($usbc);

        $this->assertEquals($result, 'The phone is charging. Charging via USB-C');
    }

    public function testChargeMicroUbs(): void{
        
        $phone = new Phone();
        $microUsb = new MicroUSBCharger();

        $adapter = new MicroUSBToUSBCAdapter($microUsb);

        $result = $phone->charging($adapter);

        $this->assertEquals($result, 'The phone is charging. Charging via USB_C through Charging via MicroUSBToUSB');

    }
}