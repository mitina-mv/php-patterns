<?php 

namespace MariaS431\Lr\State;

class StateC extends State {
    public function on(): State {
        return $this;

    }

    public function off(): State {
        return $this;
    }

    public function ack(): State {
        return new StateB();
    }
}