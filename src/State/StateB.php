<?php

namespace MariaS431\Lr\State;

class StateB extends State 
{
    public function on() {
        return $this;
    }

    public function off(): State {
        return new StateA();
    }

    public function ack(): State {
        return new StateC();
    }
}
