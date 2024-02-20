<?php

namespace MariaS431\Lr\State;

class StateA extends State {
    public function on(Automaton $automaton)  {
        $automaton->setState(new StateA());
    }

    public function off(Automaton $automaton) {
        $automaton->setState(new StateB());
    }

    public function ack(Automaton $automaton) {
        $automaton->setState(new StateC());
    }

    public function toString() {
        return "A";
    }
}
