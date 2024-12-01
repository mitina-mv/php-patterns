<?php

namespace MariaS431\Lr\Adapter;

class Phone
{
    public function charging(USB_C $charger): string
    {
        return "The phone is charging. " . $charger->charge();
    }
}
