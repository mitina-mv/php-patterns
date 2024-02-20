<?php

namespace MariaS432\LR3;

require_once('State.php');
require_once('StateA.php');
require_once('StateC.php');

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
