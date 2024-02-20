<?php

namespace MariaS431\Lr\State;

class StateA extends State {
    public function on(): State {
        return new StateA();
    }

    public function off(): State {
        return new StateB();
    }

    public function ack(): State {
        return new StateC();
    }
}
