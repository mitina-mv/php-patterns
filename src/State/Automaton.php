<?php

namespace MariaS431\Lr\State;

class Automaton {
    private State $currentState;

    public function __construct(State $initialState) {
        $this->currentState = $initialState;
    }

    public function on() : void {
        $this->currentState->on($this);
    }

    public function off() : void {
        $this->currentState->off($this);
    }

    public function ack() : void {
        $this->currentState->ack($this);
    }

    public function getCurrentState() {
        return $this->currentState->toString();
    }

    public function setState(State $state) {
        $this->currentState = $state;
    }
}
