<?php

namespace MariaS431\Lr\Adapter;

class MicroUSBToUSBCAdapter extends USB_C
{
    public function __construct(public MicroUSBCharger $microUSB)
    {
    }
    public function charge(): string
    {
        return "Charging via USB_C through " . $this->microUSB->specificCharge();
    }
}
