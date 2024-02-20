<?php

namespace MariaS432\LR3;

abstract class State {
    abstract public function on();
    abstract public function off();
    abstract public function ack();
}
