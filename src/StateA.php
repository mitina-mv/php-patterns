<?php

namespace MariaS432\LR3;

require_once('State.php');
require_once('StateB.php');
require_once('StateC.php');

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
