<?php

namespace MariaS431\Lr\State;

abstract class State {
    abstract public function on() : State;
    abstract public function off() : State;
    abstract public function ack() : State;
}
