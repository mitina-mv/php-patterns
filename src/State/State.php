<?php

namespace MariaS431\Lr\State;

abstract class State {
    abstract public function on(Automaton $automaton);
    abstract public function off(Automaton $automaton);
    abstract public function ack(Automaton $automaton);
    abstract public function toString();
}
