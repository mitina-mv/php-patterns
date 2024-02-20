<?php 

namespace MariaS432\LR3;

require_once('State.php');
require_once('StateB.php');

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