<?php

namespace MariaS431\Lr\State;

abstract class State {
    abstract public function on();
    abstract public function off();
    abstract public function ack();
}
